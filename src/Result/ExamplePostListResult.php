<?php

namespace Shiftbase\Egress\Result;

class ExamplePostListResult implements ListResult
{
    //Simple implementation class for demonstration purposes
    //See demo.php

    private array $items;

    public function __construct(array $data)
    {
        $this->items = array_map(fn($itemData) => new ExamplePostResult($itemData), $data);
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
