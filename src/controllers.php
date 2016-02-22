<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app->get(
        '/',
        function () use ($app)
        {

            $form = $app['form.factory']->createBuilder('form', array('Write a blog post', 'The Post title'))
                ->add('title', 'text')
                ->add('content', 'textarea')
                ->add('save', 'submit')
                ->getForm()
            ;

            return $app['twig']->render('index.html.twig', ['form' => $form->createView()]);
        }
    )
    ->bind('homepage')
;

$app
    ->post(
        '/post/search_flies',
        function (Request $request) use ($app)
        {
            $data = [
                'title'     => 'The Post title',
                'content'   => 'Write a blog post'
            ];

            $form = $app['form.factory']->createBuilder('form', $data)
                ->add('title', 'text')
                ->add('content', 'textarea')
                ->add('save', 'submit')
                ->getForm()
            ;

            return $app['twig']->render('index.html.twig', ['form' => $form->createView()]);
        }
    )
    ->bind('search_fly')
;


$app->error(function (Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
