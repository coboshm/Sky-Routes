<?php

use SkyRoutes\Resources\HomeController;
use SkyRoutes\Resources\SearchCountryController;

// Home
$app['controller.home'] = $app->factory(function ($app) {
    return new HomeController($app['twig']);
});


$app['controller.api.searchCountry'] = $app->factory(function ($app) {
    return new SearchCountryController($app['application.SearchCountry']);
});
