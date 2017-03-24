<?php

namespace Http\Factory\Diactoros;

use Http\Factory\Diactoros\UriFactory;
use Interop\Http\Factory\ServerRequestFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory as DiactorosServerRequestFactory;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    public function createServerRequest($method, $uri)
    {
        $serverParams = [];
        $uploadedFiles = [];

        return new ServerRequest(
            $serverParams,
            $uploadedFiles,
            $uri,
            $method
        );
    }

    public function createServerRequestFromArray(array $server)
    {
        $normalizedServer = DiactorosServerRequestFactory::normalizeServer($server);
        $headers = DiactorosServerRequestFactory::marshalHeaders($server);

        $request = new ServerRequest(
            $normalizedServer,
            [],
            DiactorosServerRequestFactory::marshalUriFromServer($normalizedServer, $headers),
            DiactorosServerRequestFactory::get('REQUEST_METHOD', $server, 'GET')
        );

        return $request;
    }
}
