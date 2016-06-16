<?php

namespace Http\Factory\Diactoros;

use Psr\Http\Factory\RequestFactoryInterface;
use Zend\Diactoros\Request;

class RequestFactory implements RequestFactoryInterface
{
    public function createRequest($method, $uri)
    {
        if (is_string($uri)) {
            return new Request($uri, $method);
        }

        return (new Request(null, $method))
            ->withUri($uri);
    }
}
