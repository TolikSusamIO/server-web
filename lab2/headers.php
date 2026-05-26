<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Результат get_headers</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="https://online.mospolytech.ru/pluginfile.php/1/theme_opentechnology/settings_setpolytech_header_logoimage/1778364012/logo.svg" alt="logo">
            <h1>Результат функции get_headers</h1>
        </header>
        <main>
            <textarea rows="15" cols="80">
               <?php
                $url = 'http://httpbin.org';
                print_r(get_headers($url));
                ?>
            </textarea>
        </main>
        <footer>
            Самостоятельная работа
        </footer>
    </body>
</html>