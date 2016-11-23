<?php

namespace Http\Factory\Diactoros;

use Http\Factory\Diactoros\UriFactory;
use Interop\Http\Factory\ServerRequestFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory as DiactorosServerRequestFactory;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    public function createServerRequest(array $server, $method = null, $uri = null)
    {
        $normalizedServer = DiactorosServerRequestFactory::normalizeServer($server);
        $headers = DiactorosServerRequestFactory::marshalHeaders($server);

        $request = new ServerRequest(
            $normalizedServer,
            [],
            DiactorosServerRequestFactory::marshalUriFromServer($normalizedServer, $headers),
            DiactorosServerRequestFactory::get('REQUEST_METHOD', $server, 'GET')
        );

        if (null !== $method) {
            $request = $request->withMethod($method);
        }

        if (null !== $uri) {
            if (!$uri instanceof UriInterface) {
                $uri = (new UriFactory())->createUri($uri);
            }

            $request = $request->withUri($uri);
        }

        return $request;
    }
}
