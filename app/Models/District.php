<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'province_id', 'user_id', 'created_at', 'updated_at'];

    const INSERT_FIELD = ['name', 'province_id', 'user_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}