<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class QuoteService
{
    public function getRandomQuote()
    {
        $client = HttpClient::create();

        try {
            $response = $client->request('GET', 'http://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en');
            $content = $response->getContent();
            $data = json_decode($content, true);

            if (isset($data['quoteText'])) {
                return $data['quoteText'];
            }

            throw new \Exception('Unable to get quote from API');

        } catch (\Exception|\Throwable $e) {
            return "The best way to predict the future is to invent it.";
        }
    }
}
