<?php include __DIR__ . '/../header.php'; ?>

<h1>Редактирование статьи</h1>

<form action="" method="post">

    <label>
        Название статьи
        <br>
        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($article->getName()) ?>"
            size="50">
    </label>

    <br><br>

    <label>
        Текст статьи
        <br>
        <textarea
            name="text"
            rows="10"
            cols="80"><?= htmlspecialchars($article->getText()) ?></textarea>
    </label>

    <br><br>

    <input type="submit" value="Сохранить">

</form>

<?php include __DIR__ . '/../footer.php'; ?>