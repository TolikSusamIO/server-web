<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Домашняя работа: Solve the equation</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="https://online.mospolytech.ru/pluginfile.php/1/theme_opentechnology/settings_setpolytech_header_logoimage/1778364012/logo.svg" alt="logo">
            <h1>Домашняя работа: Solve the equation.</h1>
        </header>
        <main>
               <?php
                    $equation = "X * 9 = 56";
                    echo $equation . "<br>";

                    list($left, $right) = explode("=", $equation);

                    $left = trim($left);
                    $right = trim($right);

                    $result = (float)$right;

                    $operator = "";

                    if (strpos($left, "+") !== false) {
                        $operator = "+";
                    }

                    if (strpos($left, "-") !== false) {
                        $operator = "-";
                    }

                    if (strpos($left, "*") !== false) {
                        $operator = "*";
                    }

                    if (strpos($left, "/") !== false) {
                        $operator = "/";
                    }

                    list($a, $b) = explode($operator, $left);

                    $a = trim($a);
                    $b = trim($b);

                    switch ($operator) {

                        case "+":

                            if ($a == "X") {
                                $x = $result - $b;
                            } else {
                                $x = $result - $a;
                            }

                            break;

                        case "-":

                            if ($a == "X") {
                                $x = $result + $b;
                            } else {
                                $x = $a - $result;
                            }

                            break;

                        case "*":

                            if ($a == "X") {
                                $x = $result / $b;
                            } else {
                                $x = $result / $a;
                            }

                            break;

                        case "/":

                            if ($a == "X") {
                                $x = $result * $b;
                            } else {
                                $x = $a / $result;
                            }

                            break;

                        default:
                            echo "Неизвестный оператор";
                            exit;
                    }

                    echo "Оператор: " . $operator . "<br>";
                    echo "X = " . $x;
                     ?>
                     <img src="./8c5e9451-69e4-41ac-90dc-55d7d83f3d37.png" class="chema">
        </main>
        <footer>
            Самостоятельная работа
        </footer>
    </body>
</html>