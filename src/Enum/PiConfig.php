<?php declare(strict_types=1);

namespace App\Enum;

enum PiConfig: string
{
    case PI1 = 'pi1';
    case PI2 = 'pi2';
    case PI3 = 'pi3';

    public function getConfig(): array
    {
        return match($this) {
            self::PI1 => ['host' => 'kevback', 'port' => 8080, 'endpoint' => '/api'],
            self::PI2 => ['host' => '192.168.1.102', 'port' => 8080, 'endpoint' => '/api'],
            self::PI3 => ['host' => '192.168.1.103', 'port' => 8080, 'endpoint' => '/api'],
        };
    }
}