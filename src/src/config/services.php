<?php
return [
  'request' => [
    'class' => blink\http\Request::class,
    'middleware' => [],
    'sessionKey' => function (\blink\http\Request $request) {
      $cookie = $request->cookies->get('SESSIONID');
      if ($cookie) {
        return $cookie->value;
      }
      $session = session()->put([]);
      response()->cookies->add(new \blink\http\Cookie([
        'name' => 'SESSIONID',
        'value' => $session->id,
      ]));
      return $session->id;
    }
  ],
  'response' => [
    'class' => blink\http\Response::class,
    'middleware' => [],
  ],
  'session' => [
    'class' => 'blink\session\Manager',
    'expires' => 3600 * 24 * 15,
    'storage' => [
        'class' => 'blink\session\FileStorage',
        'path' => __DIR__ . '/../../runtime/sessions'
    ]
  ],
  'auth' => [
    'class' => 'blink\auth\Auth',
    'model' => 'app\models\User',
  ],
  'log' => [
    'class' => 'blink\log\Logger',
    'targets' => [
      'file' => [
          'class' => 'blink\log\StreamTarget',
          'enabled' => true,
          'stream' => env('log_file', 'php://stderr'),
          'level' => env('log_level', 'info'),
      ]
    ],
  ],
];
