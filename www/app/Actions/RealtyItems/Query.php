<?php

namespace App\Actions\RealtyItems;

use App\Models\RealtyItem;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

trait Query
{
    public function query(): QueryBuilder
    {
        return QueryBuilder::for(RealtyItem::class)
            ->allowedFilters([
                'name',
                AllowedFilter::exact('room_count'),
                AllowedFilter::callback('square', function ($query, $value) {
                    $query->whereBetween('square', $value);
                }),
                AllowedFilter::callback('img', function ($query) {
                    $query->whereNotNull('img');
                }),
            ]);
    }
}
