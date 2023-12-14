<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Define a constant for the name of the authentication token
    const AUTH_TOKEN_NAME = 'user_auth_token';
    const INITIAL_USER_ORGANIZATION_ROLE = 'Administrator';
    /**
     * Register a new user.
     *
     * @param RegisterUserRequest $request the request object containing the user data
     *
     * @throws Some_Exception_Class description of exception
     *
     * @return \Illuminate\Http\Response the HTTP response containing the user data and token
     */
    public function register(RegisterUserRequest $request) {
        try {
            // Validate the request
            $fields = $request->validated();

            // Start a database transaction
            DB::beginTransaction();

            // Create a new user
            $user = User::create([
                'email' => $fields['email'],
                'password' => bcrypt($fields['password'])
            ]);

            // Create a member
            Member::create([
                'name' => $fields['name'],
                'user_id' => $user->id
            ]);

            // Create a new organization
            $organization = Organization::create([
                'name' => $fields['organization'],
            ]);

            $role = Role::create([
                'name' => self::INITIAL_USER_ORGANIZATION_ROLE,
                'organization_id' => $organization->id
            ]);

            // Attach the organization to the user
            $user->organizations()->attach($organization->id, ['role_id' => $role->id]);

            // Commit the database transaction
            DB::commit();


            // Create a token for authentication
            $token = $user->createToken(self::AUTH_TOKEN_NAME)->plainTextToken;


            // Build the response
            $response = [
                'user' => $user,
                'token' => $token
            ];

            // Return the response with a status code of 201 (Created)
            return response($response, 201);
        } catch (\Exception $e) {
            // Handle the exception, log it, or return an appropriate error response
            return response(['message' => 'Error creating user.' . $e->getMessage()], 500);
        }
    }

    /**
     * Logs in a user.
     *
     * @param LoginUserRequest $request The login user request.
     * @throws None
     * @return Response The response containing the user and token.
     */
    public function login(LoginUserRequest $request) {
        try {
            // Validate the request fields
            $fields = $request->validated();

            // Set the invalid message
            $invalidMessage = 'Invalid email or password. Please try again.';

            // Check if the email and password fields are present
            if (!Arr::has($fields, 'email') || !Arr::has($fields, 'password')) {
                // Return a response with an error message if the email or password is missing
                return response([
                    'message' => $invalidMessage
                ], 401);
            }

            // Check if the user exists based on the email
            $user = User::where('email', $fields['email'])->first();

            // Check if the user is found and if the password is correct
            if (!$user || !Hash::check($fields['password'], $user->password)) {
                // Return a response with an error message if the email or password is invalid
                return response([
                    'message' => $invalidMessage
                ], 401);
            }

            // Create a token for the authenticated user
            $token = $user->createToken(self::AUTH_TOKEN_NAME)->plainTextToken;

            // Prepare the response with the user and token
            $response = [
                'user' => $user,
                'token' => $token
            ];

            // Return the response with a status code of 201 (Created)
            return response($response, 201);
        } catch (\Exception $e) {
            // Handle the exception, log it, or return an appropriate error response
            return response(['message' => 'Error logging in user.'], 500);
        }

    }

    /**
     * Logs out the user.
     *
     * @param Request $request The request object.
     * @throws None
     * @return \Illuminate\Http\Response The HTTP response containing a message.
     */
    public function logout(Request $request) {
        try {
            // Delete the current token
            $request->user()->currentAccessToken()->delete();

            // Return a 204 No Content response
            return response()->json([], 204);
        } catch (\Exception $e) {
            // Handle the exception, log it, or return an appropriate error response
            return response(['message' => 'Error logging out user.'], 500);
        }

    }
}
