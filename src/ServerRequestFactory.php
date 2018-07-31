<?php

namespace Http\Factory\Diactoros;

use Http\Factory\Diactoros\UriFactory;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory as DiactorosServerRequestFactory;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        $uploadedFiles = [];

        return new ServerRequest(
            $serverParams,
            $uploadedFiles,
            $uri,
            $method
        );
    }
}
