<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\ServerRequestFactoryInterface;
use Interop\Http\Factory\ServerRequestFromGlobalsFactoryInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory as Factory;

class ServerRequestFactory implements
    ServerRequestFactoryInterface,
    ServerRequestFromGlobalsFactoryInterface
{
    public function createServerRequest($method, $uri)
    {
        return new ServerRequest([], [], $uri, $method);
    }

    public function createServerRequestFromGlobals()
    {
        return Factory::fromGlobals();
    }
}
