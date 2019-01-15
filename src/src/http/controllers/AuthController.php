<?php

namespace app\http\controllers;

use blink\core\BaseObject;
use blink\http\Request;

class AuthController extends BaseObject
{
    
  public function processJWT (Request $request, Response $response) {
      //$csrfToken = $request->body->get('csrfToken'); 
      var_dump($request);
      // if (session()->get($csrfToken) !== null) {
      //   $session_username = session()->get($csrfToken)["username"];
      //   $session_password = session()->get($csrfToken)["password"];

      //   if ($session_username === $username && $session_password === $password) {
      //     $tokenid = bin2hex(random_bytes(15));
      //     $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
      //     $payload = json_encode(['token' => $tokenid]);

      //     // Encode Header to Base64Url String
      //     $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

      //     // Encode Payload to Base64Url String
      //     $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

      //     // Create Signature Hash
      //     $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);
      //     // Encode Signature to Base64Url String
      //     $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
      //     $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
      //     return $jwt;
      //   } else {
      //     return json_encode("fuck");
      //   }

        //return $csrfToken;
      }
}
