<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('feed', 'FeedController::index');
$routes->get('/filter_post', 'FeedController::get_all_post');
$routes->get('post/details/(:num)', 'FeedController::get_post_details/$1');