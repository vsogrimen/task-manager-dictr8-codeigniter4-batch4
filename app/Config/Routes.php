<?php

use CodeIgniter\Router\RouteCollection;

$admin = [
    'filter'    => ['auth', 'role:admin'],
    'namespace' => 'App\Controllers\Admin',
];

/** @var RouteCollection $routes */
$routes->group('admin', $admin, static function ($routes) {
    $routes->get('/', 'Dashboard::index', ['as' => 'admin']);
    $routes->get('categories', 'Categories::index', ['as' => 'categories']);
    $routes->post('categories', 'Categories::create');
    $routes->post('categories/(:num)/delete', 'Categories::delete/$1', [
        'as' => 'categories.delete',
    ]);
});

$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->get('register', 'Auth::registerView', ['as' => 'register']);
$routes->post('register', 'Auth::registerAction');
$routes->get('login', 'Auth::loginView', ['as' => 'login']);
$routes->post('login', 'Auth::loginAction');
$routes->post('logout', 'Auth::logoutAction', ['as' => 'logout']);

$routes->group('tasks', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Tasks::index', ['as' => 'tasks.index']);
    $routes->get('new', 'Tasks::new', ['as' => 'tasks.new']);
    $routes->post('/', 'Tasks::create', ['as' => 'tasks.create']);
    $routes->get('(:num)', 'Tasks::show/$1', ['as' => 'tasks.show']);
    $routes->get('(:num)/edit', 'Tasks::edit/$1', ['as' => 'tasks.edit']);
    $routes->post('(:num)', 'Tasks::update/$1', ['as' => 'tasks.update']);
    $routes->post('(:num)/delete', 'Tasks::delete/$1', ['as' => 'tasks.delete']);
});
