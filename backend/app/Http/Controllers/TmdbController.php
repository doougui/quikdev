<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller as BaseController;

class TmdbController extends BaseController
{
    private $url;
    private $key;
    protected $endPoint;
    protected $params;
    protected $urlRequest;

    public function __construct()
    {
        $this->url = config('services.tmdb.url');
        $this->key = config('services.tmdb.api_key');
    }

    public final function get()
    {
        $this->getUrl();

        return Http::get($this->urlRequest);
    }

    private function getUrl()
    {
        $this->urlRequest = "{$this->url}/{$this->endPoint}?api_key=$this->key&language=en_US";

        if ($this->params) {
            $this->urlRequest .= "&{$this->params}";
        }
    }
}
