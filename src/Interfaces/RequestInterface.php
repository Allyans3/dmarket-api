<?php

namespace DMarketApi\Interfaces;

interface RequestInterface
{
    public function getUrl();

    public function call();

    public function getRequestMethod();
}