<?php
session_start();

$config = require __DIR__ . '/../config/config.php';

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\core\Router;

$router = new Router($config);

// Маршруты
$router->get('/', 'ArticleController@index');
$router->get('/articles', 'ArticleController@index');
$router->get('/articles/show', 'ArticleController@show');
$router->get('/articles/create', 'ArticleController@create');
$router->post('/articles/store', 'ArticleController@store');
$router->get('/articles/edit', 'ArticleController@edit');
$router->post('/articles/update', 'ArticleController@update');
$router->post('/articles/delete', 'ArticleController@delete');
$router->get('/articles/search', 'ArticleController@search');

$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

$router->get('/study/calculator', 'StudyController@calculatorForm');
$router->post('/study/calculator', 'StudyController@calculate');

$router->dispatch();
