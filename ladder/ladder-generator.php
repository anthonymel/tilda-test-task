<?php
/**
 * Task 1: Number Ladder
 * Выводит числа от 1 до 100 в виде лесенки
 */
function printLadder(int $max = 100): void 
{
    $currentNumber = 1;
    $rowLength = 1;
    
    while ($currentNumber <= $max) {
        $row = [];
        
        // Формируем текущую строку
        for ($i = 0; $i < $rowLength && $currentNumber <= $max; $i++) {
            $row[] = $currentNumber;
            $currentNumber++;
        }
        
        echo implode(' ', $row) . PHP_EOL;
        $rowLength++;
    }
}

printLadder(100);