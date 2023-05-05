<?php

namespace Shiftbase\Egress\Parser;

use Psr\Http\Message\ResponseInterface;
use Shiftbase\Egress\Result\Result;

interface Parser
{
    //Require ResponseInterface to comply with PSR-7
    public function parse(ResponseInterface $response, string $resultClass): Result;
}
