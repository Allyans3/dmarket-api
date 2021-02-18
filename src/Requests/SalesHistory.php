<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;
use Psy\Exception\RuntimeException;

class SalesHistory extends Request implements RequestInterface
{
    const URL = 'https://api.dmarket.com/marketplace-api/v1/sales-history?GameID=%s&Title=%s&Currency=%s&Period=%s';

    private $gameId;
    private $title = '';
    private $currency = 'USD';
    private $period = '7D';
    private $method = 'GET';

    public function __construct($gameId, $options = [])
    {
        $this->gameId = $gameId;
        $this->setOptions($options);
    }

    public function getUrl(): string
    {
        return sprintf(self::URL, $this->gameId, $this->title, $this->currency, $this->period);
    }

    public function call($options = [], $proxy = [])
    {
        return $this->setOptions($options)->steamHttpRequest($proxy);
    }

    public function getRequestMethod(): string
    {
        return $this->method;
    }

    private function setOptions($options): SalesHistory
    {
        if (isset($options['title'])) {
            $this->title = rawurlencode($options['title']);
        } else {
            throw new RuntimeException("Option 'title' must be filled");
        }

        $this->currency = $options['currency'] ?? $this->currency;
        $this->period = $options['period'] ?? $this->period;

        return $this;
    }
}