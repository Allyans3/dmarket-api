<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;

class MarketItems extends Request implements RequestInterface
{
    const URL = 'https://trading.dmarket.com/exchange/v1/market/items?gameId=%s&title=%s&currency=%s&orderBy=%s&orderDir=%s&priceFrom=%s&priceTo=%s&treeFilters=%s&types=%s&offset=%s&limit=%s&platform=%s&isLoggedIn=%s';

    private string $gameId;
    private string $orderBy = 'best_deals';
    private string $orderDir = 'desc';
    private string $title = '';
    private int $priceFrom = 0;
    private int $priceTo = 0;
    private string $treeFilters = '';
    private string $types = 'dmarket';
    private int $offset = 0;
    private int $limit = 100;
    private string $currency = 'USD';
    private string $platform = 'browser';
    private bool $isLoggedIn = true;

    private string $method = 'GET';

    public function __construct($gameId, $options = [])
    {
        $this->gameId = $gameId;
        $this->setOptions($options);
    }

    public function getUrl()
    {
        return sprintf(self::URL, $this->gameId, $this->title, $this->currency, $this->orderBy, $this->orderDir,
                        $this->priceFrom, $this->priceTo, $this->treeFilters, $this->types, $this->offset, $this->limit,
                        $this->platform, $this->isLoggedIn);
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
        $this->orderBy = $options['orderBy'] ?? $this->orderBy;
        $this->orderDir = $options['orderDir'] ?? $this->orderDir;
        $this->title = $options['title'] ?? $this->title;
        $this->priceFrom = $options['priceFrom'] ?? $this->priceFrom;
        $this->priceTo = $options['priceTo'] ?? $this->priceTo;
        $this->treeFilters = $options['treeFilters'] ?? $this->treeFilters;
        $this->types = $options['types'] ?? $this->types;
        $this->offset = $options['offset'] ?? $this->offset;
        $this->limit = $options['limit'] ?? $this->limit;
        $this->currency = $options['currency'] ?? $this->currency;
        $this->platform = $options['platform'] ?? $this->platform;
        $this->isLoggedIn = $options['isLoggedIn'] ?? $this->isLoggedIn;

        return $this;
    }
}