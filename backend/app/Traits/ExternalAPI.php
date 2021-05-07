<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ExternalAPI
{
    private $baseUrl;
    private $key;
    protected $endpoint;
    protected $params;
    protected $url;

    public function __construct()
    {
        $this->baseUrl = config('services.tmdb.url');
        $this->key = config('services.tmdb.api_key');
    }

    public final function get()
    {
        $this->buildUrl();

        return Http::get($this->url);
    }

    private function buildUrl()
    {
        $this->url = "{$this->baseUrl}/{$this->endpoint}?api_key=$this->key&language=en_US";

        if ($this->params) {
            $this->url .= $this->params;
        }
    }
}
