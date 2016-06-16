<?php

namespace Http\Factory\Diactoros;

use PHPUnit_Framework_TestCase as TestCase;
use Psr\Http\Message\StreamInterface;

class StreamFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new StreamFactory();
    }

    private function assertStream($stream, $content)
    {
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertSame($content, (string) $stream);
    }

    public function testCreateStream()
    {
        $stream = $this->factory->createStream();

        $this->assertStream($stream, '');
    }

    public function testCreateStreamFromCallback()
    {
        $callback = function () {
            return 'i am a teapot';
        };

        $stream = $this->factory->createStreamFromCallback($callback);

        $this->assertStream($stream, $callback());
    }

    public function testCreateStreamFromResource()
    {
        $resource = tmpfile();

        $stream = $this->factory->createStreamFromResource($resource);

        $this->assertStream($stream, '');
    }

    public function testCreateStreamFromString()
    {
        $string = 'would you like some crumpets?';

        $stream = $this->factory->createStreamFromString($string);

        $this->assertStream($stream, $string);
    }
}
