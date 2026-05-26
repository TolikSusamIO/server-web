<?php
$result = "";
if (isset($_GET['result'])) {
    $result = $_GET['result'];
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Калькулятор</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="https://online.mospolytech.ru/pluginfile.php/1/theme_opentechnology/settings_setpolytech_header_logoimage/1778364012/logo.svg" alt="logo">
            <h1>Домашняя работа: Calculator.</h1>
        </header>
        <main class="calculator">
            <form method="POST" action="calculator.php">
                <input
                        type="text"
                        id="display"
                        name="expression"
                        class="display"
                        readonly
                        value="<?php echo htmlspecialchars($result); ?>"
                >
                <div class="buttons">
                    <button type="button" onclick="append('7')">7</button>
                    <button type="button" onclick="append('8')">8</button>
                    <button type="button" onclick="append('9')">9</button>
                    <button type="button" onclick="append('/')">/</button>
                    <button type="button" onclick="append('4')">4</button>
                    <button type="button" onclick="append('5')">5</button>
                    <button type="button" onclick="append('6')">6</button>
                    <button type="button" onclick="append('*')">*</button>
                    <button type="button" onclick="append('1')">1</button>
                    <button type="button" onclick="append('2')">2</button>
                    <button type="button" onclick="append('3')">3</button>
                    <button type="button" onclick="append('-')">-</button>

                    <button type="button" onclick="append('0')">0</button>
                    <button type="button" onclick="append('.')">.</button>
                    <button type="button" onclick="append('(')">(</button>
                    <button type="button" onclick="append(')')">)</button>

                    <button type="button" onclick="append('+')">+</button>
                    <button type="button" onclick="append('^')">x²</button>
                    <button type="button" onclick="append('sqrt(')">√</button>
                    <button type="button" onclick="append('ln(')">ln</button>
                    <button type="button" onclick="append('log(')">log</button>
                    <button type="button" onclick="append('!')">!</button>
                    <button type="button" onclick="append('pi')">π</button>
                    <button type="button" onclick="append('e')">e</button>
                    <button type="button" onclick="clearDisplay()">C</button>
                    <button type="submit">=</button>
                </div>
            </form>
        </main>
        <footer>
            Задание для самостоятельной работы
        </footer>
        <script src="script.js"></script>
    </body>
</html>