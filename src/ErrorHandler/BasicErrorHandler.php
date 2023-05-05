<?php

namespace Shiftbase\Egress\ErrorHandler;

use Psr\Http\Message\ResponseInterface;

class BasicErrorHandler implements ErrorHandler
{
    public function handle(ResponseInterface $response): void
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 400) {
            throw new \RuntimeException("Request failed with status code: {$statusCode}");
        }
    }
}

