<?php

namespace Artcustomer\ElevenLabsClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\ElevenLabsClient\Http\UserRequest;
use Artcustomer\ElevenLabsClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class UserConnector extends AbstractConnector
{

    /**
     * @param AbstractApiClient $client
     */
    public function __construct(AbstractApiClient $client)
    {
        parent::__construct($client, false);
    }

    /**
     * @return IApiResponse
     */
    public function getUserInfo(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(UserRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @return IApiResponse
     */
    public function getUserSubscriptionInfo(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::SUBSCRIPTION
        ];
        $request = $this->client->getRequestFactory()->instantiate(UserRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
