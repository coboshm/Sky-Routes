<?php

use SkyRoutes\Resources\HomeController;

// Home
$app['controller.home'] = $app->factory(function ($app) {
    return new HomeController($app['twig']);
});
