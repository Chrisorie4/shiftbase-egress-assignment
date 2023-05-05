<?php

namespace Shiftbase\Egress\Serializer;

use Psr\Http\Message\RequestInterface;

interface Serializer
{
    //Require RequestInterface to comply with PSR-7
    public function serialize(RequestInterface $request, array $data): RequestInterface;
}
