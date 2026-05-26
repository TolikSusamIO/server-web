<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Форма обратной связи</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="https://online.mospolytech.ru/pluginfile.php/1/theme_opentechnology/settings_setpolytech_header_logoimage/1778364012/logo.svg" alt="logo">
            <h1>Домашняя работа: Feedback Form. Время выполнения</h1>
        </header>
        <main>
            <form action="https://httpbin.org/post" method="POST">
                <label>Имя пользователя</label>
                <input type="text" name="username" required>
                
                <label>E-mail пользователя</label>
                <input type="email" name="email" required>

                <label>Тип обращения</label>
                <select name="type">
                    <option value="Жалоба">Жалоба</option>
                    <option value="Предложение">Предложение</option>
                    <option value="Благодарность">Благодарность</option>
                </select>

                <label>Текст обращения</label>
                <textarea name="message" rows="6" required></textarea>
                
                <label>Вариант ответа</label>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="reply[]" value="sms">
                        SMS
                    </label>
                    <label>
                        <input type="checkbox" name="reply[]" value="email">
                        E-mail
                    </label>
                </div>

                <button type="submit">Отправить</button>
            </form>
            <a class="link" href="headers.php">
                Перейти на 2 страницу
            </a>

        </main>
        <footer>
            Самостоятельная работа
        </footer>
    </body>
</html>