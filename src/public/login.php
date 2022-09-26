<?php
/**
 * Responsável pela autenticação dos usuários 
 * 
 */

 $retorno = [
    "email" => $_REQUEST["email"],  
    "senha" => $_REQUEST["senha"]
 ];

 echo json_encode($retorno, JSON_PRETTY_PRINT);