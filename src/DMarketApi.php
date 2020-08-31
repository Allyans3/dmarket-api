<?php

namespace DMarketApi;

use DMarketApi\Config\Config;
use Psy\Exception\RuntimeException;

class DMarketApi
{
    const CLASS_PREFIX = '\\DMarketApi\\Requests\\';

    public function gamesList($proxy = [])
    {
        $type = 'GamesList';

        $class = self::CLASS_PREFIX . $type;

        if (!class_exists($class)) {
            throw new RuntimeException('Call to undefined request type');
        }

        return (new $class())->call($proxy)->response();
    }

    public function marketItems(string $game = null, array $options = [], $proxy = [])
    {
        $type = 'MarketItems';

        return $this->request($type, Config::GAME[$game], $options)->call($options, $proxy)->response();
    }

    public function salesHistory(string $game = null, array $options = [], $proxy = [])
    {
        $type = 'SalesHistory';

        return $this->request($type, Config::GAME[$game], $options)->call($options, $proxy)->response();
    }

    public function lastSales(string $game = null, array $options = [], $proxy = [])
    {
        $type = 'LastSales';

        return $this->request($type, Config::GAME[$game], $options)->call($options, $proxy)->response();
    }

    private function request($type, $gameId, array $options)
    {
        if (!$gameId) {
            throw new RuntimeException('Game ID not defined');
        }

        $class = self::CLASS_PREFIX . $type;

        if (!class_exists($class)) {
            throw new RuntimeException('Call to undefined request type');
        }

        return new $class($gameId, $options);
    }
}