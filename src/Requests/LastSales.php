<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;
use Psy\Exception\RuntimeException;

class LastSales extends Request implements RequestInterface
{
    const URL = 'https://api.dmarket.com/marketplace-api/v1/last-sales?Title=%s&GameID=%s&Currency=%s';

    private $gameId;
    private $title = '';
    private $currency = 'USD';
    private $method = 'GET';

    public function __construct($gameId, $options = [])
    {
        $this->gameId = $gameId;
        $this->setOptions($options);
    }

    public function getUrl(): string
    {
        return sprintf(self::URL, $this->title,$this->gameId, $this->currency);
    }

    public function call($options = [], $proxy = [])
    {
        return $this->setOptions($options)->steamHttpRequest($proxy);
    }

    public function getRequestMethod(): string
    {
        return $this->method;
    }

    private function setOptions($options): LastSales
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