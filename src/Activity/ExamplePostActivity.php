<?php

namespace Shiftbase\Egress\Activity;

use Shiftbase\Egress\Result\ExamplePostListResult;
use Shiftbase\Egress\Result\ExamplePostResult;

class ExamplePostActivity implements Activity
{
    //Simple implementation class for demonstration purposes
    //See demo.php

    public function __construct(private array $data = [], private array $headers = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return 'https://jsonplaceholder.typicode.com/posts';
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
    //Determine whether or not a Result or ListResult needs to get used here
    public function getExpectedResultClass(): string
    {
        return ExamplePostListResult::class;
    }
}
