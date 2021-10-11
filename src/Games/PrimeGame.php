<?php

namespace Brain\Games\PrimeGame;

use function Brain\Engine\engineGame;

use const Brain\Engine\ROUNDS_COUNT;

function primeData(): void
{
    $rounds = ROUNDS_COUNT;
    $startMessage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    $question = random_int(1, 50);
    $count = 0;
    for ($i = 1; $i <= $question / 2; $i++) {
        if ($question % $i === 0) {
            $count++;
        }
    }
    $answer = ($count === 1) ? 'yes' : 'no';
    return [$question, $answer];
}
