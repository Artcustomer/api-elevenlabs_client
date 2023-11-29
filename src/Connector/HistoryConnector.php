<?php

namespace Artcustomer\ElevenLabsClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\ElevenLabsClient\Http\HistoryRequest;

/**
 * @author David
 */
class HistoryConnector extends AbstractConnector
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
    public function getGeneratedItems(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(HistoryRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $historyItemId
     * @return IApiResponse
     */
    public function getHistoryItemById(string $historyItemId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $historyItemId
        ];
        $request = $this->client->getRequestFactory()->instantiate(HistoryRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $historyItemId
     * @return IApiResponse
     */
    public function deleteHistoryItemById(string $historyItemId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => $historyItemId
        ];
        $request = $this->client->getRequestFactory()->instantiate(HistoryRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
