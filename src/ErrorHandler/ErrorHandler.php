<?php

namespace Shiftbase\Egress\ErrorHandler;
use Psr\Http\Message\ResponseInterface;

interface ErrorHandler
{
    //Require ResponseInterface to comply with PSR-7
    public function handle(ResponseInterface $response): void;
}
