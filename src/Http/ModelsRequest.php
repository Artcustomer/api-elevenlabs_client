<?php

namespace Artcustomer\ElevenLabsClient\Http;

use Artcustomer\ElevenLabsClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class ModelsRequest extends ApiRequest
{

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct();

        $this->initParams();
        $this->hydrate($data);
        $this->extendParams();
    }

    /**
     * @return void
     */
    protected function buildUri(): void
    {
        $this->uri = sprintf('%s/%s', $this->uriBase, ApiEndpoints::MODELS);

        if (!empty($this->endpoint)) {
            $this->uri = sprintf('%s/%s', $this->uri, $this->endpoint);
        }
    }

    /**
     * @return void
     */
    protected function buildHeaders(): void
    {
        parent::buildHeaders();
    }

    /**
     * @return void
     */
    private function initParams(): void
    {
        $this->body = $this->body ?? [];
    }

    /**
     * Extend parameters
     *
     * @return void
     */
    private function extendParams(): void
    {

    }
}
