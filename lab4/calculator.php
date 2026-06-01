<?php


function validateExpression($expr)
{
    return preg_match('/^[0-9+\-*\/().^!a-z\s]+$/i', $expr);
}

function tokenize($expr)
{
    preg_match_all(
        '/sqrt|ln|log|pi|e|\d+(\.\d+)?|[+\-*\/^!()]|\S/',
        $expr,
        $matches
    );

    return $matches[0];
}

/*
|--------------------------------------------------------------------------
| Парсер
|--------------------------------------------------------------------------
*/

function parseExpression(&$tokens)
{
    $value = parseTerm($tokens);

    while (!empty($tokens)) {

        $op = $tokens[0];

        if ($op == '+' || $op == '-') {

            array_shift($tokens);

            $next = parseTerm($tokens);

            if ($op == '+') {
                $value = add($value, $next);
            } else {
                $value = subtract($value, $next);
            }

        } else {
            break;
        }
    }

    return $value;
}

function parseTerm(&$tokens)
{
    $value = parsePower($tokens);

    while (!empty($tokens)) {

        $op = $tokens[0];

        if ($op == '*' || $op == '/') {

            array_shift($tokens);

            $next = parsePower($tokens);

            if ($op == '*') {
                $value = multiply($value, $next);
            } else {
                $value = divide($value, $next);
            }

        } else {
            break;
        }
    }

    return $value;
}

function parsePower(&$tokens)
{
    $value = parseFactor($tokens);

    while (!empty($tokens) && $tokens[0] == '^') {

        array_shift($tokens);

        $next = parseFactor($tokens);

        $value = power($value, $next);
    }

    return $value;
}

function parseFactor(&$tokens)
{
    $token = array_shift($tokens);

    // Отрицательные числа
    if ($token == '-') {
        return -parseFactor($tokens);
    }

    // Скобки
    if ($token == '(') {

        $value = parseExpression($tokens);

        if (!empty($tokens) && $tokens[0] == ')') {
            array_shift($tokens);
        }

        return $value;
    }

    // sqrt
    if ($token == 'sqrt') {

        array_shift($tokens); // (

        $value = parseExpression($tokens);

        array_shift($tokens); // )

        return squareRoot($value);
    }

    // ln
    if ($token == 'ln') {

        array_shift($tokens);

        $value = parseExpression($tokens);

        array_shift($tokens);

        return naturalLog($value);
    }

    // log
    if ($token == 'log') {

        array_shift($tokens);

        $value = parseExpression($tokens);

        array_shift($tokens);

        return logTen($value);
    }

    // pi
    if ($token == 'pi') {
        return pi();
    }

    // e
    if ($token == 'e') {
        return exp(1);
    }

    $value = floatval($token);

    // Факториал
    if (!empty($tokens) && $tokens[0] == '!') {

        array_shift($tokens);

        $value = factorial($value);
    }

    return $value;
}


function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
    if ($b == 0) {
        return "Ошибка: деление на ноль";
    }

    return $a / $b;
}

function power($a, $b)
{
    return pow($a, $b);
}

function squareRoot($a)
{
    return sqrt($a);
}

function naturalLog($a)
{
    return log($a);
}

function logTen($a)
{
    return log10($a);
}

function factorial($n)
{
    if ($n < 0) {
        return "Ошибка";
    }

    if ($n == 0 || $n == 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $expression = $_POST['expression'];

    if (!validateExpression($expression)) {

        header("Location: index.php?result=Ошибка+ввода");
        exit;
    }

    $tokens = tokenize($expression);

    $result = parseExpression($tokens);

    header("Location: index.php?result=" . urlencode($result));
    exit;
}
?>