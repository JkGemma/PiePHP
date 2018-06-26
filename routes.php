<?php

use Core\Router;

// INDEX & 404
Router::connect('/', ['controller' => 'user', 'action' => 'index']);
Router::connect('/404', ['controller' => 'error', 'action' => 'error']);

//DEFAULT ROUTES
Router::connect('/user', ['controller' => 'user', 'action' => 'default']);
Router::connect('/app', ['controller' => 'app', 'action' => 'default']);
Router::connect('/error', ['controller' => 'error', 'action' => 'default']);

// USER ROUTES
Router::connect('/user/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/user/login', ['controller' => 'user', 'action' => 'logIn']);

Router::connect('/valentin/lol', ['controller' => 'soutenance', 'action' => 'test']);

?>
