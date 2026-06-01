<h2>Новая статья</h2>

<form action="<?= $baseUrl ?>/articles/store" method="post" enctype="multipart/form-data">
    <div>
        <label>Заголовок</label><br>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Содержимое</label><br>
        <textarea name="content" rows="10" required></textarea>
    </div>
    <div>
        <label>Файл (необязательно)</label><br>
        <input type="file" name="file">
    </div>
    <button type="submit">Сохранить</button>
</form>
