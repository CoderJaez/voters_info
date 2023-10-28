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

$routes->get('/users', [User::class, 'index']);

$routes->get('/images', [Image::class, 'index']);

$routes->get('/videos', [Video::class,'index']);