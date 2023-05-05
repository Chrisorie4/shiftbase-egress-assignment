<?php

namespace Shiftbase\Egress\Result;

class ExamplePostResult implements Result
{
    //Simple implementation class for demonstration purposes
    //See demo.php

    private int $id;
    private int $userId;
    private string $title;
    private string $body;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->userId = $data['userId'];
        $this->title = $data['title'];
        $this->body = $data['body'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
