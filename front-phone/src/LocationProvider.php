<?php

declare(strict_types=1);

namespace Task3\src;

use Task3\src\Contracts\LocationProviderInterface;

/**
 * Провайдер местоположения
 */
class LocationProvider implements LocationProviderInterface
{
    public function detectCity(): ?string
    {
        $ip = $this->getClientIp();
        
        if (!$ip) {
            return null;
        }

        // По хорошему - попробовать достать из кеша и ниже засеттить туда же

        $city = $this->resolveCity($ip);


        return $city;
    }

    private function getClientIp(): ?string
    {
        $headers = [
            'HTTP_X_FORWARDED_FOR',
            'HTTP_CLIENT_IP',
            'REMOTE_ADDR'
        ];

        foreach ($headers as $header) {
            if (!empty($_SERVER[$header])) {
                $ip = trim(explode(',', $_SERVER[$header])[0]);
                if (filter_var($ip, FILTER_VALIDATE_IP)) {
                    return $ip;
                }
            }
        }

        return null;
    }

    /**
     * Определяет город по IP
     * В реальном проекте здесь будет вызов внешнего API или базы данных
     */
    private function resolveCity(string $ip): ?string
    {
        // Заглушка - в реальном проекте здесь обращение к сервису геолокации
        return null;
    }
}
