<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Task3\src\ArrayDataSource;
use Task3\src\LocationProvider;
use Task3\src\Services\ContactResolverService;

/**
 * Task 3: Динамическое определение контактов
 * - возможно php код вынести в контроллер (как пример)
 * - сюда передавать только параметр с коротким номером (уже зарезолвленным)
 * - также добавить ajax эндпоинт в контроллер и здесь подключить js скрипт для обновления номера 
 * (тут как раз будет оправдано использование DIGITS в номере как шаблон)
 */

$phones = [
    'Москва' => '555-35-35',
    'Санкт-Петербург' => '555-36-36',
    'Казань' => 'XXX-XX-XX',
];

// если храним только короткие номера
$prepend = '8-800-';

$dataSource = new ArrayDataSource($phones, 'DIGITS');
$locationProvider = new LocationProvider();

$resolver = new ContactResolverService($locationProvider, $dataSource);
$phone = $prepend . $resolver->resolve();


// === ИСПОЛЬЗОВАНИЕ В HTML ===
?>
<!DOCTYPE html>
<html>
<head>
    <title>Контакты</title>
</head>
<body>
    <header>
        <a href="tel:<?= htmlspecialchars($phone) ?>"><?= htmlspecialchars($phone) ?></a>
    </header>
    
    <main>
        <h1>Контакты</h1>
    </main>
    
    <footer>
        <a href="tel:<?= htmlspecialchars($phone) ?>"><?= htmlspecialchars($phone) ?></a>
    </footer>
</body>
</html>
