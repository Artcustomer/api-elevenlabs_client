<?php

namespace Artcustomer\ElevenLabsClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\ElevenLabsClient\Http\VoicesRequest;
use Artcustomer\ElevenLabsClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class VoicesConnector extends AbstractConnector
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
    public function getVoices(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(VoicesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @return IApiResponse
     */
    public function getDefaultVoicesSettings(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => sprintf('%s/%s', ApiEndpoints::SETTINGS, ApiEndpoints::DEFAULT)
        ];
        $request = $this->client->getRequestFactory()->instantiate(VoicesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $voiceId
     * @return IApiResponse
     */
    public function getVoice(string $voiceId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $voiceId
        ];
        $request = $this->client->getRequestFactory()->instantiate(VoicesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $voiceId
     * @return IApiResponse
     */
    public function getVoiceSettings(string $voiceId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => sprintf('%s/%s', $voiceId, ApiEndpoints::SETTINGS)
        ];
        $request = $this->client->getRequestFactory()->instantiate(VoicesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $voiceId
     * @return IApiResponse
     */
    public function deleteVoice(string $voiceId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => $voiceId
        ];
        $request = $this->client->getRequestFactory()->instantiate(VoicesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
