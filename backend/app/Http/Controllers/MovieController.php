<?php

namespace App\Http\Controllers;

/**
 * Class MovieController
 * @package App\Http\Controllers
 */
class MovieController extends TmdbController
{
    /**
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function index()
    {
        $this->endPoint = 'movie/popular';
        $movies = $this->get();

        return response($movies, 200);
    }

    /**
     *
     */
    public function show()
    {
        //
    }
}
