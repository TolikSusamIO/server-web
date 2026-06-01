<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;

class ArticlesController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

    if (!empty($_POST)) {

        $article->setName($_POST['name']);
        $article->setText($_POST['text']);

        $article->update();

        header('Location: /php-blog/www/articles/' . $article->getId());

        exit();
    }

    $this->view->renderHtml('articles/edit.php', [
        'article' => $article,
        'title' => 'Редактирование статьи'
    ]);
}

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $author = $article->getAuthor();

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'author' => $author,
            'title' => $article->getName()
        ]);
    }
}
