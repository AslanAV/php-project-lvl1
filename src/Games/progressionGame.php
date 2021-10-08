<?php

namespace Brain\Games\progressionGame;

use function Brain\Engine\engineGame;

function progression()
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
    $start = random_int(1, 20);
    $step = random_int(1, 10);
    $len = random_int(5, 10);
    $progression = [];
    for ($i = 1; $i <= $len; $i++) {
        $progression[] = $start;
        $start += $step;
        $len = random_int(5, 10);
    }
    $hideNum = random_int(0, $len - 1);
    $answer = $progression[$hideNum];
    $progression[$hideNum] = '..';
    $question = implode(' ', $progression);
    return ['question' => $question, 'answer' => (string)$answer];
}
