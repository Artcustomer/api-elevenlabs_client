<?php

namespace Artcustomer\ElevenLabsClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\ElevenLabsClient\Http\SamplesRequest;
use Artcustomer\ElevenLabsClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class SamplesConnector extends AbstractConnector
{

    /**
     * @param AbstractApiClient $client
     */
    public function __construct(AbstractApiClient $client)
    {
        parent::__construct($client, false);
    }

    /**
     * @param string $voiceId
     * @param string $sampleId
     * @return IApiResponse
     */
    public function getAudioFromSample(string $voiceId, string $sampleId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => sprintf('%s/%s/%s/%s', $voiceId, ApiEndpoints::SAMPLES, $sampleId, ApiEndpoints::AUDIO)
        ];
        $request = $this->client->getRequestFactory()->instantiate(SamplesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $voiceId
     * @param string $sampleId
     * @return IApiResponse
     */
    public function deleteSample(string $voiceId, string $sampleId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => sprintf('%s/%s/%s', $voiceId, ApiEndpoints::SAMPLES, $sampleId)
        ];
        $request = $this->client->getRequestFactory()->instantiate(SamplesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
