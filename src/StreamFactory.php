<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Zend\Diactoros\Stream;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        $resource = fopen('php://temp', 'r+');
        fwrite($resource, $content);
        rewind($resource);

        return $this->createStreamFromResource($resource);
    }

    public function createStreamFromFile(string $file, string$mode = 'r'): StreamInterface
    {
        $resource = fopen($file, $mode);

        return $this->createStreamFromResource($resource);
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return new Stream($resource);
    }
}
