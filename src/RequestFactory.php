<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Request;

class RequestFactory implements RequestFactoryInterface
{
    public function createRequest(string $method, $uri): RequestInterface
    {
        return new Request($uri, $method);
    }
}
