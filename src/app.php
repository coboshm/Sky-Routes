<?php

use Silex\Application;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Braincrafted\Bundle\BootstrapBundle\Twig\BootstrapBadgeExtension;
use Braincrafted\Bundle\BootstrapBundle\Twig\BootstrapFormExtension;
use Braincrafted\Bundle\BootstrapBundle\Twig\BootstrapIconExtension;
use Braincrafted\Bundle\BootstrapBundle\Twig\BootstrapLabelExtension;

$app = new Application();
$app->register(new FormServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), ['locale_fallbacks' => array('en')]);
$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.form.templates' => ['bootstrap.html.twig']]);
$app->register(new Predis\Silex\PredisServiceProvider(), [
    'predis.parameters' => 'tcp://127.0.0.1:6379',
    'predis.options'    => ['profile' => '2.2'],
]);

$app['twig'] = $app->share($app->extend('twig', function($twig) {
    $twig->addExtension(new BootstrapIconExtension('fa'));
    $twig->addExtension(new BootstrapLabelExtension);
    $twig->addExtension(new BootstrapBadgeExtension);
    $twig->addExtension(new BootstrapFormExtension);

    return $twig;
}));

return $app;
