<?php

namespace App\Controller;

use App\Handler\Connector;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class WebsocketController extends AbstractController
{
    #[Route('/websocket', name: 'websocket')]
    public function indexAction(Request $request, HubInterface $hub) : JsonResponse
    {

        $update = new Update(
            'topic/status',
            json_encode(['status' => 'ok'])
        );
        $hub->publish($update);

        return new JsonResponse(['success' => true]);
    }

    #[Route('/roboter/einlagern', name: 'einlagern')]
    public function einlagern(Request $request) : JsonResponse
    {
        $connector = new Connector(HttpClient::create());

        $command = [
            'aktion' => 'einlagern',
            'lager' => 1,
            'etage' => 0
        ];

        $serverConfig = [
            'host' => "kevback",
            'port' => "5000",
            'endpoint' => "/roboter_befehl"
        ];

        $response = $connector->sendCommand($command, $serverConfig);

        return new JsonResponse($response);
    }

    #[Route('/roboter/auslagern', name: 'auslagern')]
    public function auslagern()
    {
        $connector = new Connector(HttpClient::create());
        $command = [
            'aktion' => 'auslagern',
            'lager' => 1,
            'etage' => 0
        ];

        $serverConfig = [
            'host' => "kevback",
            'port' => "5000",
            'endpoint' => "/roboter_befehl"
        ];

        $response = $connector->sendCommand($command, $serverConfig);

        return new JsonResponse($response);
    }

    #[Route('/roboter/home', name: 'home')]
    public function home(): JsonResponse
    {
        $connector = new Connector(HttpClient::create());
        $command = [
            'aktion' => 'home'
        ];

        $serverConfig = [
            'host' => "kevback",
            'port' => "5000",
            'endpoint' => "/roboter_befehl"
        ];

        $response = $connector->sendCommand($command, $serverConfig);

        return new JsonResponse($response);
    }
}