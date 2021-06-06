<?php

namespace App\Filters;
use DB;
class GenreFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('genre', $value);
    }
}