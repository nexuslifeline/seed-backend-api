<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceSettingResource;
use App\Repositories\InvoiceRepositoryInterface;
use App\Repositories\InvoiceSettingRepositoryInterface;
use App\Utils\ErrorMessages;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class InvoiceSettingController extends Controller
{

    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository,
        private InvoiceSettingRepositoryInterface $invoiceSettingRepository
    ) {
    }

    public function update(Request $request, $orgUuid, $uuid)
    {
        try {
            $invoiceId = $this->invoiceRepository->findByUuid($uuid)->id;

            // Use updateOrCreate to either update the existing record or create a new one
            $setting = $this->invoiceSettingRepository->updateOrCreate(
                ['invoice_id' => $invoiceId],
                $request->all()
            );

            return new InvoiceSettingResource($setting);
        } catch (ModelNotFoundException $e) {
            // Resource not found
            return response()->json(['error' => ErrorMessages::RESOURCE_NOT_FOUND . $uuid . $e->getMessage()], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            // Something went wrong
            Log::error("Error during invoice update. " . $e->getMessage());
            return response()->json(['error' => ErrorMessages::SOMETHING_WENT_WRONG . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
