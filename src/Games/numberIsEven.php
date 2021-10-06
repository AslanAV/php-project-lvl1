<?php

namespace Brain\Games\numberIsEven;

use function Brain\Engine\engineGame;

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
