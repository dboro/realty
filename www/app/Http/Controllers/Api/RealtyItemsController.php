<?php

namespace App\Http\Controllers\Api;

use App\Actions\RealtyItems\FetchAction;
use App\Actions\RealtyItems\GetCountAction;
use App\Actions\RealtyItems\GetFiltersAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class RealtyItemsController extends Controller
{
    /**
     * @param FetchAction $action
     * @return JsonResponse
     */
    public function index(FetchAction $action): JsonResponse
    {
        return new JsonResponse([
            'data' => $action->run()
        ]);
    }

    /**
     * @param GetCountAction $action
     * @return JsonResponse
     */
    public function count(GetCountAction $action): JsonResponse
    {
        return new JsonResponse([
            'data' => $action->run()
        ]);
    }

    /**
     * @param GetFiltersAction $action
     * @return JsonResponse
     */
    public function filters(GetFiltersAction $action): JsonResponse
    {
        return new JsonResponse([
            'data' => $action->run()
        ]);
    }
}
