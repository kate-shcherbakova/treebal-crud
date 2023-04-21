<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class QuoteService
{
    public function getRandomQuote()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en');
        $content = $response->getContent();
        $data = json_decode($content, true);
        return $data['quoteText'];
    }
}
