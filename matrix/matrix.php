<?php
/**
 * Task 2: Random Unique Matrix
 * Создает матрицу 5x7 с уникальными числами от 1 до 1000
 */

function generateUniqueMatrix(int $rows = 5, int $cols = 7, int $min = 1, int $max = 1000): array 
{
    $totalElements = $rows * $cols;
    
    if ($totalElements > ($max - $min + 1)) {
        throw new InvalidArgumentException("Недостаточно уникальных чисел в диапазоне");
    }
    
    // Генерируем уникальные числа за O(n)
    $uniqueNumbers = range($min, $max);
    shuffle($uniqueNumbers);
    $numbers = array_slice($uniqueNumbers, 0, $totalElements);
    
    // Формируем матрицу
    $matrix = array_chunk($numbers, $cols);
    
    return $matrix;
}

function displayMatrixWithSums(array $matrix): void 
{
    $cols = count($matrix[0]);
    $rows = count($matrix);
    $colSums = array_fill(0, $cols, 0);
    
    echo "Матрица:\n";
    echo str_repeat('-', $cols * 6 + 15) . "\n";
    
    foreach ($matrix as $rowIndex => $row) {
        $rowSum = 0;
        
        foreach ($row as $colIndex => $value) {
            echo str_pad($value, 5, ' ', STR_PAD_LEFT) . ' ';
            $rowSum += $value;
            $colSums[$colIndex] += $value;
        }
        
        echo '| ' . str_pad($rowSum, 5, ' ', STR_PAD_LEFT) . " (сумма строки)\n";
    }
    
    echo str_repeat('-', $cols * 6 + 15) . "\n";
    
    // Выводим суммы по столбцам
    foreach ($colSums as $sum) {
        echo str_pad($sum, 5, ' ', STR_PAD_LEFT) . ' ';
    }
    echo "| " . array_sum($colSums) . " (общая сумма)\n";
    
    echo "(суммы столбцов)\n\n";
    
    // Выводим суммы отдельно для удобства
    echo "Суммы по строкам: ";
    foreach ($matrix as $row) {
        echo array_sum($row) . ' ';
    }
    echo "\n";
    
    echo "Суммы по столбцам: " . implode(' ', $colSums) . "\n";
}

// Использование
try {
    $matrix = generateUniqueMatrix(5, 7, 1, 1000);
    displayMatrixWithSums($matrix);
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}