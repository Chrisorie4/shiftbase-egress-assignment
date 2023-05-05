<?php

namespace Shiftbase\Egress\Result;

interface ListResult extends Result
{
    public function getItems(): array;
}
