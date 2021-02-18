<?php

namespace DMarketApi\Requests;

use DMarketApi\Engine\Request;
use DMarketApi\Interfaces\RequestInterface;

class MarketItems extends Request implements RequestInterface
{
    const URL = 'https://api.dmarket.com/exchange/v1/market/items?gameId=%s&title=%s&currency=%s&orderBy=%s&orderDir=%s&priceFrom=%s&priceTo=%s&treeFilters=%s&types=%s&cursor=%s&limit=%s&platform=%s&isLoggedIn=%s';

    private $gameId;
    private $title = '';
    private $currency = 'USD';
    private $orderBy = 'best_deals';
    private $orderDir = 'desc';
    private $priceFrom = 0;
    private $priceTo = 0;
    private $treeFilters = '';
    private $types = 'dmarket';
    private $cursor = '';
    private $limit = 100;
    private $platform = 'browser';
    private $isLoggedIn = true;

    private $method = 'GET';

    public function __construct($gameId, $options = [])
    {
        $this->gameId = $gameId;
        $this->setOptions($options);
    }

    public function getUrl(): string
    {
        return sprintf(self::URL, $this->gameId, $this->title, $this->currency, $this->orderBy, $this->orderDir,
            $this->priceFrom, $this->priceTo, $this->treeFilters, $this->types, $this->cursor, $this->limit,
            $this->platform, $this->isLoggedIn);
    }

    public function call($options = [], $proxy = [])
    {
        return $this->setOptions($options)->steamHttpRequest($proxy);
    }

    public function getRequestMethod(): string
    {
        return $this->method;
    }

    private function setOptions($options): MarketItems
    {
        $this->orderBy = $options['orderBy'] ?? $this->orderBy;
        $this->orderDir = $options['orderDir'] ?? $this->orderDir;
        $this->title = isset($options['title']) ? rawurlencode($options['title']) : $this->title;
        $this->priceFrom = $options['priceFrom'] ?? $this->priceFrom;
        $this->priceTo = $options['priceTo'] ?? $this->priceTo;
        $this->treeFilters = $options['treeFilters'] ?? $this->treeFilters;
        $this->types = $options['types'] ?? $this->types;
        $this->cursor = $options['cursor'] ?? $this->cursor;
        $this->limit = $options['limit'] ?? $this->limit;
        $this->currency = $options['currency'] ?? $this->currency;
        $this->platform = $options['platform'] ?? $this->platform;
        $this->isLoggedIn = $options['isLoggedIn'] ?? $this->isLoggedIn;

        return $this;
    }
}