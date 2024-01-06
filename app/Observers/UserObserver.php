<?php

namespace App\Observers;

use App\Jobs\EmailVerificationJob;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Dispatches an email verification job for a newly created tenant user
     *
     * @param User $user The user object
     */
    public function created(User $user)
    {
        // Refresh to get the complete user object
        $user->refresh();

        // Check if the user has an email
        if (!$user->email) {
            return;
        }

        // Check if the user is of type 'tenant'
        if ($user->type !== 'tenant') {
            return;
        }

        // Check if the user's email has been verified
        if ($user->email_verified_at) {
            return;
        }

        // Dispatch the email verification job
        dispatch(new EmailVerificationJob($user));
    }
}
