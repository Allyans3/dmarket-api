<?php

use DMarketApi\DMarketApi;

require __DIR__.'/../vendor/autoload.php';

$api = new DMarketApi();

$options = [
    'types' => 'p2p',
];

$response = $api->gamesList();

dd($response);