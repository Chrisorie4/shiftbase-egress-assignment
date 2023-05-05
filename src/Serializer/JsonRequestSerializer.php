<?php

namespace Shiftbase\Egress\Serializer;

use Psr\Http\Message\RequestInterface;

class JsonRequestSerializer implements Serializer
{
    public function serialize(RequestInterface $request, array $data): RequestInterface
    {
        $request = $request->withHeader('Content-Type', 'application/json');
        $request->getBody()->write(json_encode($data));

        return $request;
    }
}
