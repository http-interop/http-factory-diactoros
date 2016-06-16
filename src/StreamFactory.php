<?php

namespace Http\Factory\Diactoros;

use Psr\Http\Factory\StreamFactoryInterface;
use Zend\Diactoros\Stream;
use Zend\Diactoros\CallbackStream;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream()
    {
        $stream = tmpfile();

        return $this->createStreamFromResource($stream);
    }

    public function createStreamFromCallback(callable $callback)
    {
        return new CallbackStream($callback);
    }

    public function createStreamFromResource($body)
    {
        return new Stream($body);
    }

    public function createStreamFromString($body)
    {
        $stream = tmpfile();
        fwrite($stream, $body);

        return $this->createStreamFromResource($stream);
    }
}
