<?php

namespace Brain\Games\CalcGame;

use Exception;
use function Brain\Engine\engineGame;
use const Brain\Engine\ROUNDS_COUNT;

function calcData(): void
{
    $rounds = ROUNDS_COUNT;
    $startMessage = 'What is the result of the expression?';
    $gameData = generateRound($rounds);
    engineGame($gameData, $startMessage);
}

function generateRound(int $rounds): array
{
    $gameData = [];
    for ($i = 1; $i <= $rounds; $i++) {
        $gameData[$i] = generateQAPairs();
    }
    return $gameData;
}

function generateQAPairs(): array
{
    $num1 = random_int(0, 10);
    $num2 = random_int(0, 10);
    $allOperation = ["+", "-", "*"];
    $count = count($allOperation) - 1;
    $operation = $allOperation[random_int(0, $count)];
    $question = "{$num1} {$operation} {$num2}";
    switch ($operation) {
        case '+':
            $answer = $num1 + $num2;
            break;
        case '-':
            $answer = $num1 - $num2;
            break;
        case '*':
            $answer = $num1 * $num2;
            break;
        default:
            throw new Exception('Error');
    }
    return ['question' => $question, 'answer' => (string)$answer];
}
