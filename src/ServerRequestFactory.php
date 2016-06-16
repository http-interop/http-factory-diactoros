<?php

namespace Http\Factory\Diactoros;

use Psr\Http\Factory\ServerRequestFactoryInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory as Factory;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    public function createServerRequest($method, $uri)
    {
        if (is_string($uri)) {
            return new ServerRequest([], [], $uri, $method);
        }

        return (new ServerRequest([], [], null, $method))
            ->withUri($uri);
    }

    public function createServerRequestFromGlobals()
    {
        return Factory::fromGlobals();
    }
}
