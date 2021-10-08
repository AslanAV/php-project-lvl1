<?php

namespace Brain\Games\gcdGame;

use function Brain\Engine\engineGame;

function gcd(): void
{
    $rounds = 3;
    $startMessage = 'Find the greatest common divisor of given numbers.';
    $gameData = generateRound($rounds);
    $gameData = ['startMessage' => $startMessage, 'countGame' => $rounds] + $gameData;
    engineGame($gameData);
}

function generateRound(int $rounds): array
{
    $gameData = [];
    for ($i = 1; $i <= $rounds; $i++) {
        $gameData[$i] = dataRounds();
    }
    return $gameData;
}

function dataRounds(): array
{
    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);
    $question = "$num1 $num2";
    $largerNum = 0;
    $smallNum = 0;
    $answer = 1;
    switch ($num1 >= $num2) {
        case true:
            $largerNum = $num1;
            $smallNum = $num2;
            break;
        case false:
            $largerNum = $num2;
            $smallNum = $num1;
            break;
    }
    for ($i = $smallNum; $i > 0; $i--) {
        $firstCondition = (bool)($largerNum % $i);
        $secondCondition = (bool)($smallNum % $i);
        if (!($firstCondition || $secondCondition)) {
            $answer = $i;
            break;
        }
    }
    return ['question' => $question, 'answer' => (string)$answer];
}
