<?php

namespace DMarketApi\Interfaces;

interface ResponseInterface
{
    public function __construct($response);

    public function response();
}