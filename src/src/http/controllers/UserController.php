<?php
namespace app\http\controllers;
use blink\core\BaseObject;
use blink\http\Request;
use blink\http\Response;

class UserController extends BaseObject
{
  public function signup()
  {
    return app()->twig->render('user/signup.twig');
  }

  public function store(Request $request, Response $response) {
    return $request->input('firstname');
  }
}