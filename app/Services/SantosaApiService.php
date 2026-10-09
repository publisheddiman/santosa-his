<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SantosaApiService
{

    private $baseUrl;


    public function __construct()
    {
        $this->baseUrl = env('SANTOSA_API_URL');
    }



    public function get($endpoint, $params = [])
    {

        return Http::acceptJson()
            ->get($this->baseUrl . $endpoint, $params);

    }



    public function post($endpoint, $data = [])
    {

        return Http::acceptJson()
            ->withHeaders([
                'X-USER-KEY' => 'Diman Fathurohman'
            ])
            ->post($this->baseUrl . $endpoint, $data);

    }



    public function put($endpoint, $data = [])
    {

        return Http::acceptJson()
            ->withHeaders([
                'X-USER-KEY' => 'Diman Fathurohman'
            ])
            ->put($this->baseUrl . $endpoint, $data);

    }



    public function delete($endpoint)
    {

        return Http::acceptJson()
            ->withHeaders([
                'X-USER-KEY' => 'Diman Fathurohman'
            ])
            ->delete($this->baseUrl . $endpoint);

    }



    public function patch($endpoint, $data = [])
    {

        return Http::acceptJson()
            ->withHeaders([
                'X-USER-KEY' => 'Diman Fathurohman'
            ])
            ->patch($this->baseUrl . $endpoint, $data);

    }


}