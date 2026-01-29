<?php

declare(strict_types=1);

namespace Task3\src\Contracts;

/**
 * Источник данных для маппинга город-телефон
 */
interface DataSourceInterface
{
    /**
     * Получает данные для города
     *
     * @param string $city Название города
     * @return string|null Данные или null
     */
    public function get(string $city): ?string;

    /**
     * Получает значение по умолчанию
     *
     * @return string Значение по умолчанию
     */
    public function getDefault(): string;
}
