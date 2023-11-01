<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Voter;
use App\Controllers\Auth\Authentication;
use App\Controllers\User;
use App\Controllers\Video;
use App\Controllers\Image;
use App\Filters\Auth;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', [Home::class, 'index']);
$routes->get('/', [Authentication::class, 'index']);
$routes->post('/auth/login', [Authentication::class, 'login']);
$routes->get('/auth/logout', [Authentication::class, 'logout']);

$routes->get('/voters', [Voter::class, 'index'], ['filter' => Auth::class]);
$routes->get('voters/new', [Voter::class, 'new'], ['filter' => Auth::class]);
$routes->get('/voters/edit/(:any)', [Voter::class, 'edit'], ['filter' => Auth::class]);
$routes->put('/voters/(:num)', [Voter::class, 'update']);
$routes->delete('/voters/(:num)', [Voter::class, 'delete'], ['filter' => Auth::class]);
$routes->post('/voters', [Voter::class, 'create'], ['filter' => Auth::class]);


$routes->get('/users', [User::class, 'index'], ['filter' => Auth::class]);
$routes->get('/users/new', [User::class, 'new'], ['filter' => Auth::class]);
$routes->get('/users/edit/(:any)', [User::class, 'edit'], ['filter' => Auth::class]);
$routes->put('/users/(:num)', [User::class, 'update'],);
$routes->delete('/users/(:num)', [User::class, 'delete'], ['filter' => Auth::class]);
$routes->post('/users', [User::class, 'create'], ['filter' => Auth::class]);


$routes->get('/videos', [Video::class, 'index'], ['filter' => Auth::class]);
$routes->get('/videos/new', [Video::class, 'new']);
$routes->get('/videos/watch/(:any)', [Video::class, 'watch'], ['filter' => Auth::class]);
$routes->get('/videos/edit/(:any)', [Video::class, 'edit'], ['filter' => Auth::class]);
$routes->post('/videos', [Video::class, 'create'], ['filter' => Auth::class]);
$routes->put('/videos/(:any)', [Video::class, 'update'], ['filter' => Auth::class]);
$routes->delete('/videos/(:num)', [Video::class, 'delete'], ['filter' => Auth::class]);
