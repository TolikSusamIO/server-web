<?php
// ожидается, что переменные $title, $baseUrl и т.д. уже есть
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'EduLibrary') ?></title>
    <link rel="stylesheet" href="<?= $baseUrl ?>/styles.css">
</head>
<body>
<header>
    <h1><a href="<?= $baseUrl ?>/articles" class="logo">Course project</a></h1>
    <nav>
        <a href="<?= $baseUrl ?>/articles">Статьи</a>
        <a href="<?= $baseUrl ?>/study/calculator">Калькулятор учебы</a>
        <?php if (!empty($_SESSION['user'])): ?>
            <a href="<?= $baseUrl ?>/articles/create">Новая статья</a>
            <span>Привет, <?= htmlspecialchars($_SESSION['user']['username']) ?></span>
            <a href="<?= $baseUrl ?>/logout">Выход</a>
        <?php else: ?>
            <a href="<?= $baseUrl ?>/login">Вход</a>
        <?php endif; ?>
    </nav>
</header>

<main>
    <?php
    // подключаем конкретный шаблон
    $viewFile = __DIR__ . '/' . $template . '.php';
    if (file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo 'Шаблон не найден';
    }
    ?>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> EduLibrary</p>
</footer>
</body>
</html>
