<?php

namespace Artcustomer\ElevenLabsClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\ElevenLabsClient\Http\ProjectsRequest;

/**
 * @author David
 */
class ProjectsConnector extends AbstractConnector
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
    public function getProjects(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(ProjectsRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $projectId
     * @return IApiResponse
     */
    public function getProjectById(string $projectId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $projectId
        ];
        $request = $this->client->getRequestFactory()->instantiate(ProjectsRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
