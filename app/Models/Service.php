<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'user_id', 'created_at', 'updated_at'];

    const INSERT_FIELD = ['name', 'user_id', 'created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_services');
    }
}