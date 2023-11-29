<?php

namespace Artcustomer\ElevenLabsClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\ElevenLabsClient\Http\TextToSpeechRequest;
use Artcustomer\ElevenLabsClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class TextToSpeechConnector extends AbstractConnector
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
     * @param array $query
     * @param array $body
     * @return IApiResponse
     */
    public function textToSpeech(string $voiceId, array $query = [], array $body = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => $voiceId,
            'query' => $query,
            'body' => $body
        ];
        $request = $this->client->getRequestFactory()->instantiate(TextToSpeechRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $voiceId
     * @param array $query
     * @param array $body
     * @return IApiResponse
     */
    public function streaming(string $voiceId, array $query = [], array $body = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => sprintf('%s/%s', $voiceId, ApiEndpoints::STREAM),
            'query' => $query,
            'body' => $body
        ];
        $request = $this->client->getRequestFactory()->instantiate(TextToSpeechRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
