<?php

namespace App\Actions\RealtyItems;

class GetFiltersAction
{
    use Query;

    public function run()
    {

        return [
            'rooms' => $this->query()
                ->selectRaw('DISTINCT(room_count)')
                ->orderBy('room_count')
                ->get()->pluck('room_count'),
            'square' => $this->query()
                ->selectRaw('MIN(square) as min, MAX(square) as max')
                ->first()
        ];
    }
}
