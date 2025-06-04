<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'house_direction',
        'address',
        'province_id',
        'district_id',
        'ward_id',
        'street',
        'status',
        'type',
        'images',
        'video',
        'created_at',
        'updated_at'
    ];

    const INSERT_FIELD = [
        'user_id',
        'title',
        'description',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'house_direction',
        'address',
        'province_id',
        'district_id',
        'ward_id',
        'street',
        'status',
        'type',
        'images',
        'video',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'product_services');
    }
}
