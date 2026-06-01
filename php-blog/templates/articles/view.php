<?php include __DIR__ . '/../header.php'; ?>

<h1><?= $article->getName() ?></h1>

<p>
    Автор:
    <strong><?= $author->getNickname() ?></strong>
</p>

<hr>

<p><?= $article->getText() ?></p>

<p>
    <a href="/php-blog/www/articles/<?= $article->getId() ?>/edit">
        Редактировать
    </a>
</p>

<?php include __DIR__ . '/../footer.php'; ?>
