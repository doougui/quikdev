<?php

namespace App\Http\Controllers;

use App\Traits\ExternalAPI;

/**
 * Class GenresController
 * @package App\Http\Controllers
 */
class GenresController extends Controller
{
    use ExternalAPI;

    public function __construct()
    {
        $this->baseUrl = config('services.tmdb.url');
        $this->key = config('services.tmdb.api_key');
    }

    /**
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function index()
    {
        $this->endpoint = 'genre/movie/list';

        return response($this->get(), 200);
    }
}
