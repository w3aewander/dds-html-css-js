<?php
/**
 * Processar movimento remoto
 */

// var_dump($_SERVER);

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    $post = [
        'comando' => $_REQUEST['comando']
    ];

    $ch = curl_init('https://loja.wmomodavix.site/api/comando');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $response = curl_exec($ch);

    curl_close($ch);

    var_dump($response);

} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $url = "https://loja.wmomodavix.site/api/status";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $response = curl_exec($ch);

    curl_close($ch);
    var_dump($response);
}