<?php

namespace App\Handler;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Connector
{
    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    public function sendCommand(array $command, array $serverConfig): array
    {
        try {
            $response = $this->httpClient->request('POST', "http://{$serverConfig['host']}:{$serverConfig['port']}{$serverConfig['endpoint']}", [
                'json' => $command,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'timeout' => 120,
                'max_duration' => 120
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->toArray();

            return [
                'status' => $statusCode,
                'response' => $content
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}