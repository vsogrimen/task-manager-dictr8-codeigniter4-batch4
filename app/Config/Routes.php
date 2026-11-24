<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->group('tasks', static function ($routes) {
    $routes->get('/', 'Tasks::index', ['as' => 'tasks.index']);
    $routes->get('new', 'Tasks::new', ['as' => 'tasks.new']);
    $routes->post('/', 'Tasks::create', ['as' => 'tasks.create']);
    $routes->get('(:num)', 'Tasks::show/$1', ['as' => 'tasks.show']);
    $routes->get('(:num)/edit', 'Tasks::edit/$1', ['as' => 'tasks.edit']);
    $routes->post('(:num)', 'Tasks::update/$1', ['as' => 'tasks.update']);
    $routes->post('(:num)/delete', 'Tasks::delete/$1', ['as' => 'tasks.delete']);
});
