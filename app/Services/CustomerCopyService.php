<?php

namespace App\Services;

use App\Models\CustomerCopy;
use App\Repositories\Contracts\CustomerRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CustomerCopyService
{
    public function __construct(
        protected CustomerRepositoryInterface $customerRepository
    ) {
    }

    public function copyToCustomer2(): int
    {
        return DB::transaction(function () {
            CustomerCopy::query()->delete();

            $rows = $this->customerRepository
                ->getCopyDataset()
                ->map(fn ($customer) => [
                    'source_customer_id' => $customer->customer_id,
                    'company' => $customer->company,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'address' => $customer->address,
                    'city' => $customer->city,
                    'region' => $customer->region,
                    'postbox' => $customer->postbox,
                    'email' => $customer->email,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
                ->toArray();

            if (!empty($rows)) {
                CustomerCopy::query()->insert($rows);
            }

            return count($rows);
        });
    }
}