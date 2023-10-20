<?php

namespace App\Actions\RealtyItems;

class GetCountAction
{
    use Query;

    public function run(): int
    {
        return $this->query()->count();
    }
}
