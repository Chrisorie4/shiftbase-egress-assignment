<?php

namespace Shiftbase\Egress\Connector;

use Psr\Http\Client\ClientInterface;
use Shiftbase\Egress\Activity\Activity;
use Shiftbase\Egress\Result\Result;

interface Connector
{
    public function perform(Activity $activity): Result;
}
