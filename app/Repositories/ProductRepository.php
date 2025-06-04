<?php
namespace App\Repositories;
class ProductRepository extends BaseRepository
{
    public function model()
    {
        return \App\Models\Product::class;
    }
}
