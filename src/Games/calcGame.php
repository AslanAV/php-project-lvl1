<?php

namespace Brain\Games\calcGame;

use function Brain\Engine\engineGame;

function generateSum()
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $arrOperation = ["+", "-", "*"];
    $operation = $arrOperation[rand(0, 2)];
    $question = "$num1 $operation $num2";
    switch ($operation) {
        case '+':
            $answer = $num1 + $num2;
        case '-':
            $answer = $num1 - $num2;
        case '*':
            $answer = $num1 * $num2;
    }
}

function generate()
{
    $question = rand(0, 100);
    $condition = $question % 2;
    return [$question, !(bool)$condition];
}

function isEven()
{
    $rounds = 3;
    $startMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 1; $i <= $rounds; $i++) {
        $gameData[$i] = generate();
    }
    $gameData = ['startMessage'=>$startMessage, 'countGame'=>$rounds] + $gameData;
    engineGame($gameData);
}