<?php

namespace app\http\controllers;

use blink\core\BaseObject;

class IndexController extends BaseObject
{
    private $username;
    private $password;
    private $token;

    public function __construct() {
      // $manage = session()->put();
      // $this->token = $manage->id;
      // $usernameString = "eventpass";
      // $passwordString = "@eventpass001";
      // $salt= bin2hex(random_bytes(10));
      // $this->username = crypt($usernameString, $salt);
      // $this->password = crypt($passwordString, $salt);
      // // save session
      // $manage->set($this->token, [
      //     "username" => $this->username,
      //     "password" => $this->password,
      // ]);
    }
    
    public function registration()
    {
      return app()->twig->render('index.twig', [
        'csrfToken' => $this->token,
        // 'username' => $this->username,
        // 'password' => $this->password,
      ]);
    }
}
