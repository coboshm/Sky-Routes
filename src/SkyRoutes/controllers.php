<?php

use SkyRoutes\Resources\HomeController;
use SkyRoutes\Resources\SearchCountryController;
use SkyRoutes\Resources\SearchFliesController;

// Home
$app['controller.home'] = $app->factory(function ($app) {
    return new HomeController($app['twig']);
});


$app['controller.api.searchCountry'] = $app->factory(function ($app) {
    return new SearchCountryController($app['application.SearchCountry']);
});

$app['controller.api.searchFlies'] = $app->factory(function ($app) {
    return new SearchFliesController($app['twig'], $app['application.SearchFlies']);
});
