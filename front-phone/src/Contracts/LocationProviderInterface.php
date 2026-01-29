<?php

declare(strict_types=1);

namespace Task3\src\Contracts;

/**
 * Провайдер определения местоположения
 */
interface LocationProviderInterface
{
    /**
     * Определяет город клиента
     *
     * @return string|null Название города или null
     */
    public function detectCity(): ?string;
}
