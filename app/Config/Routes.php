<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Voter;
use App\Controllers\Auth\Authentication;
use App\Controllers\User;
use App\Controllers\Video;
use App\Controllers\Image;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', [Home::class, 'index']);
$routes->get('/', [Authentication::class, 'index']);
$routes->post('/auth/login', [Authentication::class, 'login']);

$routes->get('/voters', [Voter::class, 'index']);
$routes->get('voters/new', [Voter::class, 'new']);
$routes->get('/voters/edit/(:any)', [Voter::class, 'edit']);
$routes->put('/voters/(:num)', [Voter::class, 'update']);
$routes->delete('/voters/(:num)', [Voter::class, 'delete']);
$routes->post('/voters', [Voter::class, 'create']);


$routes->get('/users', [User::class, 'index']);
$routes->get('/users/new', [User::class, 'new']);
$routes->get('/users/edit/(:any)', [User::class, 'edit']);
$routes->put('/users/(:num)', [User::class, 'update']);
$routes->delete('/users/(:num)', [User::class, 'delete']);
$routes->post('/users', [User::class, 'create']);

$routes->get('/images', [Image::class, 'index']);

$routes->get('/videos', [Video::class, 'index']);
$routes->get('/videos/new', [Video::class, 'new']);
$routes->post('/videos', [Video::class, 'create']);
$routes->delete('/videos/(:num)', [Video::class, 'delete']);
