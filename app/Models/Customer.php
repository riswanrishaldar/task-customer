<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'cberp_customers';

    protected $primaryKey = 'customer_id';

    public $timestamps = false;

    protected $fillable = [
        'company',
        'name',
        'phone',
        'address',
        'city',
        'region',
        'postbox',
        'email',
    ];

    protected $casts = [
        'customer_id' => 'integer',
    ];
}