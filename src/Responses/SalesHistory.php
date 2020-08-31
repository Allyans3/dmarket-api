<?php

namespace DMarketApi\Responses;

use DMarketApi\Interfaces\ResponseInterface;

class SalesHistory implements ResponseInterface
{
    private $data;

    public function __construct($response)
    {
        $this->data = $this->decodeResponse($response);
    }

    public function response()
    {
        return $this->data;
    }

    private function decodeResponse($response)
    {
        return json_decode($response, true);
    }
}