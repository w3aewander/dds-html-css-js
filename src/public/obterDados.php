<?php
/**
 *  Proxy para obtenção de dados.
 */

 header('Content-type: application/json');

 $ch = curl_init();
 $url = "http://w3aewander.gratisphphost.info/api/processarComando.php";

 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
 //curl_setopt($ch,CURLOPT_HEADER, true); //se precisar enviar header para a requisição
 
 $output = curl_exec($ch);

curl_close($ch);

echo json_decode($output);
