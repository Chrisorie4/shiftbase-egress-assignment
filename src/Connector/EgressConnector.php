<?php

namespace Shiftbase\Egress\Connector;
//PSR-18 Client
use Psr\Http\Client\ClientInterface;
//PSR-17 Factory
use Psr\Http\Message\RequestFactoryInterface;
use Shiftbase\Egress\Activity\Activity;
//PSR-7 Messaging
use Shiftbase\Egress\ErrorHandler\ErrorHandler;
use Shiftbase\Egress\Parser\Parser;
use Shiftbase\Egress\Result\Result;
use Shiftbase\Egress\Serializer\Serializer;


class EgressConnector implements Connector
{
    public function __construct(
        private ClientInterface $httpClient,
        private RequestFactoryInterface $requestFactory,
        private ErrorHandler $errorHandler,
        private Parser $parser,
        private Serializer $serializer,
        private array $defaultHeaders = []
    ) {}

    public function perform(Activity $activity): Result
    {
        $request = $this->requestFactory->createRequest(
            $activity->getMethod(),
            $activity->getUri()
        );

        $request = $this->serializer->serialize($request, $activity->getData());
        // Add default headers and activity headers
        $headers = array_merge($this->defaultHeaders, $activity->getHeaders());
        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }
        $response = $this->httpClient->sendRequest($request);
        $this->errorHandler->handle($response);

        return $this->parser->parse($response, $activity->getExpectedResultClass());
    }

}
