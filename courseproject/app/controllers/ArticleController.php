<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Article;

class ArticleController extends Controller
{
    public function index(): void
    {
        $articleModel = new Article($this->config);
        $articles = $articleModel->all();
        $stats = $articleModel->stats();

        $this->view('articles/index', [
            'title' => 'Список статей',
            'articles' => $articles,
            'stats' => $stats,
        ]);
    }

    public function show(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $articleModel = new Article($this->config);
        $article = $articleModel->find($id);

        if (!$article) {
            http_response_code(404);
            echo 'Статья не найдена';
            return;
        }

        $this->view('articles/show', [
            'title' => $article['title'],
            'article' => $article,
        ]);
    }

    public function create(): void
    {
        if (!$this->isAdmin()) {
            $this->redirect('/login');
        }

        $this->view('articles/create', [
            'title' => 'Новая статья',
        ]);
    }

    public function store(): void
    {
        if (!$this->isAdmin()) {
            $this->redirect('/login');
        }

        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $filePath = null;

        if (!empty($_FILES['file']['name'])) {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filename = time() . '_' . basename($_FILES['file']['name']);
            $target = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                $filePath = '/uploads/' . $filename;
            }
        }

        if ($title && $content) {
            $articleModel = new Article($this->config);
            $articleModel->create($title, $content, $filePath);
        }

        $this->redirect('/articles');
    }

    public function edit(): void
    {
        if (!$this->isAdmin()) {
            $this->redirect('/login');
        }

        $id = (int)($_GET['id'] ?? 0);
        $articleModel = new Article($this->config);
        $article = $articleModel->find($id);

        if (!$article) {
            http_response_code(404);
            echo 'Статья не найдена';
            return;
        }

        $this->view('articles/edit', [
            'title' => 'Редактирование статьи',
            'article' => $article,
        ]);
    }

    public function update(): void
    {
        if (!$this->isAdmin()) {
            $this->redirect('/login');
        }

        $id = (int)($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $filePath = null;

        if (!empty($_FILES['file']['name'])) {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filename = time() . '_' . basename($_FILES['file']['name']);
            $target = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                $filePath = '/uploads/' . $filename;
            }
        }

        if ($id && $title && $content) {
            $articleModel = new Article($this->config);
            $articleModel->update($id, $title, $content, $filePath);
        }

        $this->redirect('/articles');
    }

    public function delete(): void
    {
        if (!$this->isAdmin()) {
            $this->redirect('/login');
        }

        $id = (int)($_POST['id'] ?? 0);
        if ($id) {
            $articleModel = new Article($this->config);
            $articleModel->delete($id);
        }

        $this->redirect('/articles');
    }

    public function search(): void
    {
        $q = trim($_GET['q'] ?? '');
        $articleModel = new Article($this->config);
        $articles = $q ? $articleModel->search($q) : [];

        $this->view('articles/index', [
            'title' => 'Поиск статей',
            'articles' => $articles,
            'search_query' => $q,
            'stats' => $articleModel->stats(),
        ]);
    }
}
