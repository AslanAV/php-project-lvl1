<?php

namespace Brain\Games\numberIsEven;

use function Brain\Engine\engineGame;

function generate()
{
    $question = rand(0, 100);
    $condition = $question % 2;
    switch (!(bool)$condition) {
        case true:
            $answer = 'yes';
            break;
        case false:
            $answer = 'no';
            break;
    }
    return [$question, !(bool)$condition, $answer];
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
