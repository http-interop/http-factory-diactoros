<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\StreamFactoryInterface;
use Zend\Diactoros\Stream;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream($content = '')
    {
        $resource = fopen('php://temp', 'r+');
        fwrite($resource, $content);
        rewind($resource);

        return $this->createStreamFromResource($resource);
    }

    public function createStreamFromFile($file, $mode = 'r')
    {
        return new Stream($file, $mode);
    }

    public function createStreamFromResource($resource)
    {
        return new Stream($resource);
    }
}
