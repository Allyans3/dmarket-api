<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;

class GamesList extends Request implements RequestInterface
{
    const URL = 'https://trading.dmarket.com/exchange/v1/games';

    private string $method = 'GET';

    public function getUrl()
    {
        return self::URL;
    }

    public function call($proxy = [])
    {
        return $this->steamHttpRequest($proxy);
    }

    public function getRequestMethod()
    {
        return $this->method;
    }
}