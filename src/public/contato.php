<?php
/**
 *  Testar a classe contato..
 */

require __DIR__ . '/../../vendor/autoload.php';
header('Access-Control-Allow-Origin:*');
header('Content-Type: text/html; charset=UTF-8');

 ini_set('display_errors', TRUE);
 ini_set('error_reporting', E_ALL|E_CORE_WARNING);

 $contato = new \App\Controllers\ContatoController();

 $contatos = $contato->getAll();

 //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );
 echo $contatos;