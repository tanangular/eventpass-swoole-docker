<?php
return [
    ['GET', '/', function (blink\http\Response $response) {
      return $response->redirect('/signup');
    }],
    ['GET', '/signup', 'UserController@signup'],
    ['POST', '/signup', 'UserController@store'],
    // ['GET', '/', 'IndexController@registration'],
    // ['POST', '/auth', 'AuthController@processJWT']
];
