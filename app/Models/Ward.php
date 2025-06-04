<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['name', 'district_id', 'user_id', 'created_at', 'updated_at'];

    const INSERT_FIELD = ['name', 'district_id', 'user_id', 'created_at', 'updated_at'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}