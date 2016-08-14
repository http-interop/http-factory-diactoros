<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\StreamFactoryInterface;
use Zend\Diactoros\Stream;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream($resource)
    {
        return new Stream($resource);
    }
}
