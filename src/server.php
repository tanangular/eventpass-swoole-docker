<?php
$http = new swoole_http_server("0.0.0.0", 9501);

$http->on("start", function ($server) {
    echo "ตอนนี้ Swoole ได้อุบัติบนโลกแล้ว นักโทษ ภาคทัณฑ์ หมายเลข 45454656 รายงานตัวด่วน http server is started at http://127.0.0.1:9501\n";
});

$http->on("request", function ($request, $response) {
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World Elymsime\n");
});

$http->start();