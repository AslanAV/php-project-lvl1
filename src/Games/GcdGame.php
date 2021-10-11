<?php

namespace Brain\Games\GcdGame;

use function Brain\Engine\engineGame;
use const Brain\Engine\ROUNDS_COUNT;

function gcdData(): void
{
    $rounds = ROUNDS_COUNT;
    $startMessage = 'Find the greatest common divisor of given numbers.';
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
    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);
    [$question, $answer] = largerNum($num1, $num2);
    return ['question' => $question, 'answer' => $answer];
}

function largerNum(int $num1, int $num2): array
{
    $question = "$num1 $num2";
    $answer = 1;
    if ($num1 >= $num2) {
        $largerNum = $num1;
        $smallNum = $num2;
    } else {
        $largerNum = $num2;
        $smallNum = $num1;
    }
    for ($i = $smallNum; $i > 0; $i--) {
        $firstCondition = (bool)($largerNum % $i);
        $secondCondition = (bool)($smallNum % $i);
        if (!($firstCondition || $secondCondition)) {
            $answer = $i;
            break;
        }
    }
    return [$question, (string)$answer];
}
