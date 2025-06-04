<?php

namespace App\Repositories;

class ServiceRepository extends BaseRepository
{
    public function model()
    {
        return \App\Models\Service::class;
    }
}
