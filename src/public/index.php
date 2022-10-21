<?php

require __DIR__ . '/../../vendor/autoload.php';

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// $parsed_url = parse_url($_SERVER['REQUEST_URI']);

// //die(var_dump($parsed_url['path']) );


// if ($parsed_url['path'] === '/home') {
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once( __DIR__ . '/index.html');
    }

// }

// // se a página não existir
// // então emita  o erro de requisição inválida.
// http_response_code(400); // 400 Bad Request
// echo 'Invalid Request';

?>