<?php

namespace Http\Factory\Diactoros;

use Interop\Http\Factory\ResponseFactoryInterface;
use Zend\Diactoros\Response;

class ResponseFactory implements ResponseFactoryInterface
{
    public function createResponse($code = 200)
    {
        return (new Response())
            ->withStatus($code);
    }
}
