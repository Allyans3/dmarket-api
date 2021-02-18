<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;

class GamesList extends Request implements RequestInterface
{
    const URL = 'https://api.dmarket.com/exchange/v1/games';

    private $method = 'GET';

    public function getUrl(): string
    {
        return self::URL;
    }

    public function call($proxy = [])
    {
        return $this->steamHttpRequest($proxy);
    }

    public function getRequestMethod(): string
    {
        return $this->method;
    }
}