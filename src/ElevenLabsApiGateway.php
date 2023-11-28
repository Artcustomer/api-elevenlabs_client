<?php

namespace Artcustomer\ElevenLabsClient;

use Artcustomer\ApiUnit\Gateway\AbstractApiGateway;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ElevenLabsClient\Utils\ApiInfos;

/**
 * @author David
 */
class ElevenLabsApiGateway extends AbstractApiGateway
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->defineParams();
    }

    /**
     * @return void
     */
    public function initialize(): void
    {
        $this->setupConnectors();

        $this->client->initialize();
    }

    public function test(): IApiResponse
    {

    }

    /**
     * @return void
     */
    private function setupConnectors(): void
    {

    }

    /**
     * @return void
     */
    private function defineParams(): void
    {
        $this->params['api_name'] = ApiInfos::API_NAME;
        $this->params['api_version'] = ApiInfos::API_VERSION;
        $this->params['protocol'] = ApiInfos::PROTOCOL;
        $this->params['host'] = ApiInfos::HOST;
        $this->params['version'] = ApiInfos::VERSION;
    }
}
