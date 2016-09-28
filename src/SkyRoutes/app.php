<?php

use Silex\Application;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Config\FileLocator;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\CsrfServiceProvider;
use Symfony\Component\Translation\Translator;

$app = new Application();


$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new RoutingServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new CsrfServiceProvider());
$app->register(new TranslationServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());

$app->register(new MonologServiceProvider(), [
    'monolog.logfile' => __DIR__ . '/../../var/logs/silex_' . (($app['debug']) ? 'dev' : 'prod') . '.log',
    'monolog.name' => 'sky_routes'
]);

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    $loader     = new YamlFileLoader(new FileLocator(__DIR__ . '/Config'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);

    return $routes;
});

$app['twig'] = $app->factory($app->extend('twig', function ($twig) {
    return $twig;
}));


$app['translator'] = $app->extend('translator', function(Translator $translator, Application $app) {
    $translator->addLoader('yaml', new \Symfony\Component\Translation\Loader\YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/en.yml', 'en');
    $translator->addResource('yaml', __DIR__.'/locales/es.yml', 'es');
    $translator->addResource('yaml', __DIR__.'/locales/fr.yml', 'fr');

    return $translator;
});

require __DIR__ . '/services.php';
require __DIR__ . '/controllers.php';

return $app;
