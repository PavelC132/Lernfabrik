<?php

declare(strict_types=1);

namespace App\Handler;

use App\Enum\PiConfig;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WebSocketHandler
{
    private HttpClientInterface $httpClient;
    private Connector $connector;

    public function __construct()
    {
        $this->httpClient = HttpClient::create();
        $this->connector = new Connector($this->httpClient);
    }

    public function execute(): void
    {
        // Material abrufen
        $materialCommand = ['action' => 'getMaterial', 'saeule' => 1];
        $this->sendCommand($materialCommand, PiConfig::PI3);

        // Pi 3: Material auslagern
        $auslagerCommand = ['action' => 'auslagerMaterial', 'params' => ['material' => 'x']];
        $this->sendCommand($auslagerCommand, PiConfig::PI3);

        // Pi 2: Material zur Produktion transportieren
        $transportCommand = ['action' => 'transportMaterial', 'params' => ['von' => 'lager', 'zu' => 'produktion']];
        $this->sendCommand($transportCommand, PiConfig::PI2);

        // Pi 1: Produktion starten
        $produktionCommand = ['action' => 'startProduktion', 'params' => ['produkt' => 'x']];
        $produktionResult = $this->sendCommand($produktionCommand, PiConfig::PI1);

        // Warten auf Beendigung der Produktion
        while ($produktionResult['status'] !== 'fertig') {
            sleep(60); // Warte eine Minute und prüfe dann erneut
            $statusCommand = ['action' => 'getProduktionStatus', 'params' => []];
            $produktionResult = $this->sendCommand($statusCommand, PiConfig::PI1);
        }

        // Pi 2: Fertiges Produkt transportieren
        $transportFertigCommand = ['action' => 'transportMaterial', 'params' => ['von' => 'produktion', 'zu' => 'lager']];
        $this->sendCommand($transportFertigCommand, PiConfig::PI2);

        // Pi 3: Produkt einlagern
        $einlagerCommand = ['action' => 'einlagerProdukt', 'params' => ['produkt' => 'x', 'ort' => 'säule']];
        $this->sendCommand($einlagerCommand, PiConfig::PI3);
    }

    private function sendCommand(array $command, PiConfig $piConfig): array
    {
        return $this->connector->sendCommand($command, $piConfig->getConfig());
    }
}