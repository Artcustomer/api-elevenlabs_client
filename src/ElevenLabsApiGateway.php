<?php

namespace Artcustomer\ElevenLabsClient;

use Artcustomer\ApiUnit\Gateway\AbstractApiGateway;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ElevenLabsClient\Client\ApiClient;
use Artcustomer\ElevenLabsClient\Connector\HistoryConnector;
use Artcustomer\ElevenLabsClient\Connector\ModelsConnector;
use Artcustomer\ElevenLabsClient\Connector\ProjectsConnector;
use Artcustomer\ElevenLabsClient\Connector\SamplesConnector;
use Artcustomer\ElevenLabsClient\Connector\TextToSpeechConnector;
use Artcustomer\ElevenLabsClient\Connector\UserConnector;
use Artcustomer\ElevenLabsClient\Connector\VoicesConnector;
use Artcustomer\ElevenLabsClient\Utils\ApiInfos;

/**
 * @author David
 */
class ElevenLabsApiGateway extends AbstractApiGateway
{

    private ?ModelsConnector $modelsConnector = null;
    private ?HistoryConnector $historyConnector = null;
    private ?ProjectsConnector $projectsConnector = null;
    private ?SamplesConnector $samplesConnector = null;
    private ?TextToSpeechConnector $textToSpeechConnector = null;
    private ?UserConnector $userConnector = null;
    private ?VoicesConnector $voicesConnector = null;

    private string $apiKey;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @throws \ReflectionException
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->defineParams();

        parent::__construct(ApiClient::class, [$this->params]);
    }

    /**
     * @return void
     */
    public function initialize(): void
    {
        $this->client->initialize();
    }

    /**
     * @return IApiResponse
     */
    public function test(): IApiResponse
    {
        return $this->getUserConnector()->getUserInfo();
    }

    /**
     * @return ModelsConnector
     */
    public function getModelsConnector(): ModelsConnector
    {
        if ($this->modelsConnector === null) {
            $this->modelsConnector = new ModelsConnector($this->client);
        }

        return $this->modelsConnector;
    }

    /**
     * @return HistoryConnector
     */
    public function getHistoryConnector(): HistoryConnector
    {
        if ($this->historyConnector === null) {
            $this->historyConnector = new HistoryConnector($this->client);
        }

        return $this->historyConnector;
    }

    /**
     * @return ProjectsConnector
     */
    public function getProjectsConnector(): ProjectsConnector
    {
        if ($this->projectsConnector === null) {
            $this->projectsConnector = new ProjectsConnector($this->client);
        }

        return $this->projectsConnector;
    }

    /**
     * @return SamplesConnector
     */
    public function getSamplesConnector(): SamplesConnector
    {
        if ($this->samplesConnector === null) {
            $this->samplesConnector = new SamplesConnector($this->client);
        }

        return $this->samplesConnector;
    }

    /**
     * @return TextToSpeechConnector
     */
    public function getTextToSpeechConnector(): TextToSpeechConnector
    {
        if ($this->textToSpeechConnector === null) {
            $this->textToSpeechConnector = new TextToSpeechConnector($this->client);
        }

        return $this->textToSpeechConnector;
    }

    /**
     * @return UserConnector
     */
    public function getUserConnector(): UserConnector
    {
        if ($this->userConnector === null) {
            $this->userConnector = new UserConnector($this->client);
        }

        return $this->userConnector;
    }

    /**
     * @return VoicesConnector
     */
    public function getVoicesConnector(): VoicesConnector
    {
        if ($this->voicesConnector === null) {
            $this->voicesConnector = new VoicesConnector($this->client);
        }

        return $this->voicesConnector;
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
        $this->params['api_key'] = $this->apiKey;
    }
}
