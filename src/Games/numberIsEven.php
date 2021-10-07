<?php

namespace Brain\Games\numberIsEven;

use function Brain\Engine\engineGame;

function isEven()
{
    $rounds = 3;
    $startMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = generateRound($rounds);
    $gameData = ['startMessage'=>$startMessage, 'countGame'=>$rounds] + $gameData;
    engineGame($gameData);
}

function generateRound(int $rounds): array
{
    for ($i = 1; $i <= $rounds; $i++) {
        $gameData[$i] = dataRounds();
    }
    return $gameData;
}

function dataRounds(): array
{
    $question = rand(0, 100);
    $condition = !(bool)($question % 2);
    switch ($condition) {
        case true:
            $answer = 'yes';
            break;
        case false:
            $answer = 'no';
            break;
    }
    return ['question' => $question, 'answer' => $answer];
}
