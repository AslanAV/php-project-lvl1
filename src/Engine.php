<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
function engineGame(array $gameData, string $startMessage): void
{
    line("/Welcome to the Brain Games!/");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($startMessage);
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        [$question, $answer] = $gameData[$i];
        line("Question: {$question}");
        $answerUser = prompt("Your answer");
        if ($answerUser === $answer) {
            line("Correct!");
        } else {
            line("'$answerUser' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
