<?php

namespace App\Actions\RealtyItems;

class FetchAction
{
    use Query;

    public function run(): array
    {
        return $this->query()->simplePaginate(50)->items();
    }
}
