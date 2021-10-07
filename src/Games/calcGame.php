<?php

namespace Brain\Games\calcGame;

use function Brain\Engine\engineGame;

function calc()
{
    $rounds = 3;
    $startMessage = 'What is the result of the expression?';
    $gameData = generateRound($rounds);
    $gameData = ['startMessage'=>$startMessage, 'countGame'=>$rounds] + $gameData;
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
    $num1 = rand(0, 10);
    $num2 = rand(0, 10);
    $allOperation = ["+", "-", "*"];
    $count = count($allOperation) - 1;
    $operation = $allOperation[rand(0, $count)];
    $question = "$num1 $operation $num2";
    $answer = 0;
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
    }
    return ['question' => $question, 'answer' => (string)$answer];
}
