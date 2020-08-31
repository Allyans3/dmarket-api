<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;
use Psy\Exception\RuntimeException;

class LastSales extends Request implements RequestInterface
{
    const URL = 'https://trading.dmarket.com/marketplace-api/v1/last-sales?GameID=%s&Title=%s&Currency=%s';

    private string $gameId;
    private string $title = '';
    private string $currency = 'USD';
    private string $method = 'GET';

    public function __construct($gameId, $options = [])
    {
        $this->gameId = $gameId;
        $this->setOptions($options);
    }

    public function getUrl()
    {
        return sprintf(self::URL, $this->gameId, $this->title, $this->currency);
    }

    public function call($options = [], $proxy = [])
    {
        return $this->setOptions($options)->steamHttpRequest($proxy);
    }

    public function getRequestMethod()
    {
        return $this->method;
    }

    private function setOptions($options)
    {
        if (isset($options['title'])) {
            $this->title = rawurlencode($options['title']);
        } else {
            throw new RuntimeException("Option 'title' must be filled");
        }

        $this->currency = $options['currency'] ?? $this->currency;

        return $this;
    }
}