<?php

namespace Brain\Games\EvenGame;

use function Brain\Engine\engineGame;

use const Brain\Engine\ROUNDS_COUNT;

function evenData(): void
{
    $rounds = ROUNDS_COUNT;
    $startMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = generateRound($rounds);
    engineGame($gameData, $startMessage);
}

function generateRound(int $rounds): array
{
    $gameData = array();
    for ($i = 1; $i <= $rounds; $i++) {
        $gameData[$i] = generateQAPairs();
    }
    return $gameData;
}

function generateQAPairs(): array
{
    $question = random_int(0, 100);
    $condition = !(bool)($question % 2);
    $answer = $condition ? 'yes' : 'no';
    return ['question' => $question, 'answer' => $answer];
}
