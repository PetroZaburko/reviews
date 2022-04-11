<?php


/**
 * @var $r \FastRoute\RouteCollector
 */
$r->addRoute('GET', '', ['App\controllers\ReviewsController', 'all']);
$r->addRoute('POST', 'add', ['App\controllers\ReviewsController', 'add']);

// {id} must be a number (\d+)
//    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
//    // The /{title} suffix is optional
//    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');