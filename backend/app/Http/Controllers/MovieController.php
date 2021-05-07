<?php

namespace App\Http\Controllers;

use App\Traits\ExternalAPI;

/**
 * Class MovieController
 * @package App\Http\Controllers
 */
class MovieController extends Controller
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
        $this->endpoint = 'trending/movie/week';

        if (request('name')) {
            $this->endpoint = 'search/movie';
            $this->params = '&query=' . request('name');
        }

        if (request('genres')) {
            $this->endpoint = 'discover/movie';
            $this->params = '&with_genres=' . request('genres');
        }

        return response($this->get(), 200);
    }

    /**
     * @param $movie
     */
    public function show($movie)
    {
        $this->endpoint = 'movie/' . $movie;

        return response($this->get(), 200);
    }
}
