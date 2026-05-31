<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customerService
    ) {
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $this->customerService->create($request->validated());

        return redirect()
            ->route('dashboard')
            ->with('success', 'Customer created successfully.');
    }

    public function edit(int $customer): View
    {
        $customer = $this->customerService->findOrFail($customer);

        return view('customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, int $customer): RedirectResponse
    {
        $customer = $this->customerService->findOrFail($customer);

        $this->customerService->update($customer, $request->validated());

        return redirect()
            ->route('dashboard')
            ->with('success', 'Customer updated successfully.');
    }
}