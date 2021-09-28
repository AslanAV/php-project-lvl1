<?php

namespace Brain\Games\numberIsEven;

use function cli\line;
use function cli\prompt;

$name = '';
function welcome()
{
    global $name;
    line("Welcome to the Brain Game!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function isEven()
{
    global $name;
    $randNum = rand(0, 100);
    line("Question: {$randNum}");
    $answer = prompt("Your answer");
    if ($randNum % 2 === 0 && $answer === "yes") {
        line("Correct!");
    } elseif ($randNum % 2 !== 0 && $answer === "no") {
        line("Correct!");
    } else {
        if ($randNum % 2 === 0) {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}!");
            exit;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, {$name}!");
            exit;
        }
    }
}

function endGame()
{
    global $name;
    echo("Congratulations, {$name}!");
    echo ("\n");
}
