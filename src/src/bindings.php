<?php

/*
    Registering Twig
 */

$app->bind('twig.loader', function () {
  $view_paths = __DIR__ . '/views';
  $loader = new \Twig_Loader_Filesystem($view_paths);

  return $loader;
});

$app->bind('twig', function () use ($app) {
  $options = [
    'debug' => false,
    /*'cache' => __DIR__ . '/../cache/views/compiled'*/
    /* TODO: change cache on productions */
    'cache' => false,
  ];

  $twig = new \Twig_Environment($app->get('twig.loader'), $options);

    // register Twig Extensions
  $twig->addExtension(new \Twig_Extension_Debug());

    // register Twig globals
  $twig->addGlobal('app', $app);

  return $twig;
});

$app->bind('sworm', function(){
  $connection = require __DIR__ . '/config/db.php';
  $sworm = new Sworm();
  $sworm->connect($connection, function ($ret) {
    if ($ret->status) {
      var_dump("join database is successed: powered by sworm !!! \n ");
    } else {
      var_dump($ret->errorCode, $ret->errorMsg);
    }
  });
  //return $sworm;
});

