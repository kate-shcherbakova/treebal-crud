<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class WeatherService
{
    public function getWeather($city)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q='
            . $city . '&appid=76fe9e1e18f24780f2c656ed93ff1305&units=metric');
        $content = $response->getContent();
        $data = json_decode($content, true);

        $data['name'] = str_replace('Arrondissement de ', '', $data['name']);
        $data['weather'][0]['description'] = str_replace('Arrondissement de ', '', $data['weather'][0]['description']);

        return $data;
    }
}
