<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use External\Bar\Exceptions\ServiceUnavailableException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private MovieService $movieService;

    /**
     * @param MovieService $movieService
     */
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getTitles(Request $request): JsonResponse
    {
        $titles = $this->movieService->getTitles();
        return response()->json($titles);
    }
}
