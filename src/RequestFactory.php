<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\RequestFactoryInterface;
use Zend\Diactoros\Request;

class RequestFactory implements RequestFactoryInterface
{
    public function createRequest($method, $uri)
    {
        return new Request($uri, $method);
    }
}
