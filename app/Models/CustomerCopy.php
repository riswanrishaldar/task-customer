<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCopy extends Model
{
    protected $table = 'customer2';

    protected $fillable = [
        'source_customer_id',
        'company',
        'name',
        'phone',
        'address',
        'city',
        'region',
        'postbox',
        'email',
    ];
}