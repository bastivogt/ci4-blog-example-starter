<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Pages;
use App\Controllers\Posts;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get("/", [Pages::class, "index"]);

$routes->get("/pages/(:segment)", [Pages::class, "show"]);


// Posts
$routes->get("/posts", [Posts::class, "index"]);
$routes->get("/posts/(:num)", [Posts::class, "show"]);

$routes->get("/posts/new", [Posts::class, "new"]);
$routes->post("/posts/create", [Posts::class, "create"]);

$routes->get("/posts/edit/(:num)", [Posts::class, "edit"]);
$routes->post("/posts/update/(:num)", [Posts::class, "update"]);

$routes->get("/posts/delete/(:num)", [Posts::class, "deleteConfirm"]);
$routes->post("/posts/delete/(:num)", [Posts::class, "delete"]);
