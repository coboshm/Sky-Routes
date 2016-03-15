<?php

use SkyRoutes\Application\SearchFlies;
use SkyRoutes\Application\SearchTickets;
use SkyRoutes\Infrastructure\ApiRepository;
use SkyRoutes\Application\SearchCountry;

/**
 * Infrastructure.
 */
$app['infrastructure.api.repository'] = $app->factory(function () use ($app) {
    return new ApiRepository();
});

/**
 * Application.
 */
$app['application.SearchCountry'] = $app->factory(function () use ($app) {
    return new SearchCountry($app['infrastructure.api.repository']);
});

$app['application.SearchFlies'] = $app->factory(function () use ($app) {
    return new SearchFlies($app['infrastructure.api.repository']);
});

$app['application.SearchTickets'] = $app->factory(function () use ($app) {
    return new SearchTickets($app['infrastructure.api.repository']);
});
