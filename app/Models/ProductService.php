<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductService extends Pivot
{
    protected $table = 'product_services';

    protected $fillable = ['product_id', 'service_id'];
}