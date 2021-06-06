<?php

namespace App\Filters;
use DB;
class TypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('platform', $value);
    }
}