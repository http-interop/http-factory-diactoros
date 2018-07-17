<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

class UriFactory implements UriFactoryInterface
{
    public function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }
}
