<?php

require_once 'vendor/autoload.php'; // assuming the required libraries are installed via composer

use Http\Factory\Guzzle\RequestFactory;
use Shiftbase\Egress\Activity\Activity;
use Shiftbase\Egress\Activity\ExamplePostActivity;
use Shiftbase\Egress\Connector\EgressConnector;
use Shiftbase\Egress\ErrorHandler\BasicErrorHandler;
use Shiftbase\Egress\Parser\JsonResponseParser;
use Shiftbase\Egress\Result\ExamplePostListResult;
use Shiftbase\Egress\Serializer\JsonRequestSerializer;
use GuzzleHttp\Client;

// create the required dependencies
$httpClient = new Client();
$requestFactory = new RequestFactory();
$errorHandler = new BasicErrorHandler();
$parser = new JsonResponseParser();
$serializer = new JsonRequestSerializer();
$defaultHeaders = ['User-Agent' => 'MyClient/1.0'];

// instantiate an instance of EgressConnector
$connector = new EgressConnector(
    $httpClient,
    $requestFactory,
    $errorHandler,
    $parser,
    $serializer,
    $defaultHeaders
);

// perform the HTTP request using EgressConnector for multiple posts (ListResult)
$result = $connector->perform(new ExamplePostActivity());
if ($result instanceof ExamplePostListResult) {
    foreach ($result->getItems() as $post) {
        echo "Post ID: " . $post->getId() . PHP_EOL;
        echo "Title: " . $post->getTitle() . PHP_EOL;
        echo "Body: " . $post->getBody() . PHP_EOL;
        echo "======================" . PHP_EOL;
        echo "Class: " . get_class($post) . PHP_EOL;
    }
}