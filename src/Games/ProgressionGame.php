<?php

namespace Brain\Games\progressionGame;

use function Brain\Engine\engineGame;

use const Brain\Engine\ROUNDS_COUNT;

function progressionData(): void
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
    $startProgression = random_int(1, 20);
    $stepProgression = random_int(1, 10);
    $lenProgression = random_int(5, 10);
    $progression = [];
    for ($i = 1; $i <= $lenProgression; $i++) {
        $progression[] = $startProgression;
        $startProgression += $stepProgression;
        $lenProgression = random_int(5, 10);
    }
    $hideNum = random_int(0, $lenProgression - 1);
    $answer = $progression[$hideNum];
    $progression[$hideNum] = '..';
    $question = implode(' ', $progression);
    return ['question' => $question, 'answer' => (string)$answer];
}
