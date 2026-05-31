<?php

namespace App\Http\Controllers;

use App\Services\CustomerCopyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerCopyController extends Controller
{
    public function __construct(
        protected CustomerCopyService $customerCopyService
    ) {
    }

    public function index(): View
    {
        return view('customer-copy.index');
    }

    public function copy(Request $request): JsonResponse
    {
        $count = $this->customerCopyService->copyToCustomer2();

        return response()->json([
            'status' => true,
            'message' => 'Customer data copied successfully.',
            'count' => $count,
        ]);
    }
}