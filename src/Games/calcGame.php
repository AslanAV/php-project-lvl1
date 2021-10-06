<?php

namespace Brain\Games\calcGame;

function generateSum()
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $arrOperation = ["+", "-", "*"];
    $operation = $arrOperation[rand(0, 2)];
    $question = "$num1 $operation $num2";
    switch ($operation) {
        case '+':
            $answer = $num1 + $num2;
        case '-':
            $answer = $num1 - $num2;
        case '*':
            $answer = $num1 * $num2;
    }
}
