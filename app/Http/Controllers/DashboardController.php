<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CustomerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function __construct(
        protected CustomerRepositoryInterface $customerRepository
    ) {
    }

    public function index(): View
    {
        return view('dashboard');
    }

    public function data(): JsonResponse
    {
        $query = $this->customerRepository->query();

        return DataTables::eloquent($query)
            ->addColumn('checkbox', function ($customer) {
                return '<input type="checkbox" class="customer-checkbox" value="' . $customer->customer_id . '">';
            })
            ->addColumn('actions', function ($customer) {
                return '<a href="' . route('customers.edit', $customer->customer_id) . '" target="_blank" class="btn btn-sm btn-outline-primary">Edit</a>';
            })
            ->rawColumns(['checkbox', 'actions'])
            ->make(true);
    }
}