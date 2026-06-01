<h2>Редактирование статьи</h2>

<form action="<?= $baseUrl ?>/articles/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <div>
        <label>Заголовок</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
    </div>
    <div>
        <label>Содержимое</label><br>
        <textarea name="content" rows="10" required><?= htmlspecialchars($article['content']) ?></textarea>
    </div>
    <div>
        <label>Файл (если выбрать новый — старый просто останется в папке)</label><br>
        <input type="file" name="file">
        <?php if (!empty($article['file_path'])): ?>
            <p>Текущий файл:
                <a href="<?= $baseUrl . $article['file_path'] ?>" target="_blank">Скачать</a>
            </p>
        <?php endif; ?>
    </div>
    <button type="submit">Обновить</button>
</form>
