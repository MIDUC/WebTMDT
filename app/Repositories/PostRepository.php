<?php

namespace App\Repositories;

class PostRepository extends BaseRepository
{
    public function model()
    {
        return \App\Models\Post::class;
    }
}
