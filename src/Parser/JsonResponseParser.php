<?php

namespace Shiftbase\Egress\Parser;

use Psr\Http\Message\ResponseInterface;
use Shiftbase\Egress\Result\Result;

class JsonResponseParser implements Parser
{
    public function parse(ResponseInterface $response, string $resultClass): Result
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Failed to parse JSON response: ' . json_last_error_msg());
        }

        return new $resultClass($data);
    }
}
