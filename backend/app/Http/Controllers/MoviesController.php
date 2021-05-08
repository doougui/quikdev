<?php

namespace App\Http\Controllers;

use App\Traits\ExternalAPI;

/**
 * Class MoviesController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller
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

        if (request('search')) {
            $this->endpoint = 'search/movie';
            $this->params = '&query=' . request('search');
        }

        return response($this->get(), 200);
    }

    public function genres($genres)
    {
        $this->endpoint = 'discover/movie';
        $this->params = '&with_genres=' . $genres;

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
