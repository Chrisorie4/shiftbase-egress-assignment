<?php

namespace Shiftbase\Egress\Activity;

interface Activity
{
    public function getMethod(): string;

    public function getUri(): string;
    // Set data in constructer if neeeded
    public function getData(): array;
    // Set additional headers in constructer if neeeded
    public function getHeaders(): array;

    public function getExpectedResultClass(): string;
}
