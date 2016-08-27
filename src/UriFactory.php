<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\UriFactoryInterface;
use Zend\Diactoros\Uri;

class UriFactory implements UriFactoryInterface
{
    public function createUri($uri = '')
    {
        return new Uri($uri);
    }
}
