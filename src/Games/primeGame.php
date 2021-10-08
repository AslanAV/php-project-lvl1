<?php

namespace Brain\Games\primeGame;

use function Brain\Engine\engineGame;

function prime(): void
{
    $rounds = 3;
    $startMessage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    $question = random_int(1, 50);
    $count = 0;
    for ($i = 1; $i <= $question / 2; $i++) {
        if ($question % $i === 0) {
            $count++;
        }
    }
    if ($count === 1) {
        $answer = 'yes';
    } else {
        $answer = 'no';
    }
    return ['question' => $question, 'answer' => $answer];
}
