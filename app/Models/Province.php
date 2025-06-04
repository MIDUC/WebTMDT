<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'user_id', 'created_at', 'updated_at'];

    const INSERT_FIELD = ['name', 'user_id', 'created_at', 'updated_at'];
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}