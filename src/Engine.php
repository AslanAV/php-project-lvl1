<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function engineGame(array $gameData)
{
    line("Welcome to the Brain Game!");
//    $name = line("May I have your name?");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($gameData['startMessage']);
    rounds($gameData, $name);
    line("Congratulations, $name!");
}

function rounds(array $gameData, string $name)
{
    for ($i = 1; $i <= $gameData['countGame']; $i++) {
        line("Question: {$gameData[$i]['question']}");
//        $answerUser = line("Your answer");
        $answerUser = prompt("Your answer");
        reply($answerUser, $i, $gameData, $name);
    }
}

function reply(string $answerUser, int $i, array $gameData, string $name)
{
    if ($answerUser === $gameData[$i]['answer']) {
        line("Correct!");
    } else {
        line("'$answerUser' is wrong answer ;(. Correct answer was '{$gameData[$i]['answer']}'.");
        line("Let's try again, $name!");
        exit;
    }
}
