<?php

use App\Router;

require 'vendor/autoload.php';


$router = new Router($_GET['url']);

$router->get('/', function () {

    echo 'Homepage';
});

$router->get('/register', function () {

    echo 'register';
});

$router->get('/login', function () {

    echo 'login';
});

$router->get('/posts', function () {

    echo 'tout les posts';
});

$router->get('/posts/:id-:slug', function ($id, $slug) {
    echo "Afficher le poste $slug : $id";
}, 'Posts#show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');


$router->post('/posts/:id', function ($id) {

    echo 'Poster pour le poste' . $id .  '<pre>' . print_r($_POST, true);
});

$router->run();
