<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function engineGame($gameData)
{
    line("Welcome to the Brain Game!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($gameData['startMessage']);
    for ($i = 1; $i <= $gameData['countGame']; $i++) {
        line("Question: {$gameData[$i][0]}");
        $answerUser = prompt("Your answer");
        if ($answerUser === "yes" && $gameData[$i][1]) {
            line("Correct!");
        } elseif ($answerUser === "no" && !$gameData[$i][1]) {
            line("Correct!");
        } else {
            switch ($gameData[$i][1]) {
                case true:
                    line("'$answerUser' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, $name!");
                    exit;
                case false:
                    line("'$answerUser' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, $name!");
                    exit;
            }
        }
    }
    line("Congratulations, $name!");

}
