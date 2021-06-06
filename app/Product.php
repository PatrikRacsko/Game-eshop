<?php

namespace App;

use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','description','price', 'release_date', 'genre', 'platform', 'image', 'ingame','rating'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }
}
