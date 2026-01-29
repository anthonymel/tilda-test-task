<?php

declare(strict_types=1);

namespace Task3\src\Services

use Task3\src\Contracts\DataSourceInterface;
use Task3\src\Contracts\LocationProviderInterface;

/**
 * Сервис определения контактных данных по местоположению
 * 
 * Абстрактное решение задачи:
 * - Определяет местоположение клиента
 * - Получает соответствующие данные из источника
 * - Возвращает дефолтное значение при неудаче
 */
class ContactResolverService
{
    public function __construct(
        private readonly LocationProviderInterface $locationProvider,
        private readonly DataSourceInterface $dataSource
    ) {
    }

    /**
     * Определяет данные для клиента
     */
    public function resolve(): string
    {
        $city = $this->locationProvider->detectCity();
        
        if ($city === null) {
            return $this->dataSource->getDefault();
        }

        $data = $this->dataSource->get($city);
        
        return $data ?? $this->dataSource->getDefault();
    }
}
