<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\Contracts\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function query(): Builder
    {
        return Customer::query()->select([
            'customer_id',
            'company',
            'name',
            'phone',
            'address',
            'city',
            'region',
            'postbox',
            'email',
        ]);
    }

    public function findById(int $id): ?Customer
    {
        return Customer::query()->find($id);
    }

    public function create(array $data): Customer
    {
        return Customer::query()->create($data);
    }

    public function update(Customer $customer, array $data): Customer
    {
        $customer->update($data);

        return $customer->refresh();
    }

    public function getCopyDataset(): Collection
    {
        return Customer::query()
            ->select([
                'customer_id',
                'company',
                'name',
                'phone',
                'address',
                'city',
                'region',
                'postbox',
                'email',
            ])
            ->get();
    }
}