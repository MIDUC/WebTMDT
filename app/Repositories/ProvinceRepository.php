<?php
namespace App\Repositories;
class ProvinceRepository extends BaseRepository
{
    public function model()
    {
        return \App\Models\Province::class;
    }
}