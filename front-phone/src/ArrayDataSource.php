<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task3\Contracts\DataSourceInterface;

/**
 * Источник данных на основе массива, вместо него легко может быть 
 * реализован репозиторий на основе данных из БД (например)
 */
class ArrayDataSource implements DataSourceInterface
{
    /**
     * @param array<string, string> $data Данные
     * @param string $default Значение по умолчанию
     */
    public function __construct(
        private readonly array $data,
        private readonly string $default
    ) {
    }

    public function get(string $city): ?string
    {
        $normalized = mb_strtolower(trim($city), 'UTF-8');
        
        // Точное совпадение
        if (isset($this->data[$normalized])) {
            return $this->data[$normalized];
        }
        
        // Возможно нужно реализовать нечеткий поиск при ошибках, опечатках в словах
        
        return null;
    }

    public function getDefault(): string
    {
        return $this->default;
    }
}
