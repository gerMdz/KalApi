<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait ConsumeServicioExterno
{
    protected string $baseUri;

    /**
     * @param $method
     * @param $urlDestino
     * @param array|null $queryParams
     * @param array|null $formsParams
     * @param array|null $headers
     * @return string|null
     * @throws GuzzleException
     */
    public function makeRequest($method, $urlDestino,
                                array|null $queryParams = null, array|null $formsParams = null,
                                array|null $headers = []): string|null
    {
        $formsParams ??= [];
        $queryParams ??= [];
        $cliente = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formsParams, $headers);
        }

        $response = $cliente->request($method, $urlDestino, [
            'query' => $queryParams,
            'form_params' => $formsParams,
            'headers' => $headers
        ]);

        $response = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $response = $this->decodeResponse($response);
        }

        if (method_exists($this, 'checkSiErrorResponse')) {
            $this->checkSiErrorResponse($response);
        }

        return $response;


    }

    private function resolveAuthorization($queryParams = [], $formsParams = [], $headers = [])
    {
    }

    private function decodeResponse(string $response)
    {
    }

    private function checkSiErrorResponse(string $response)
    {
    }
}
