<?php
/**
 * Processar o envio da mensagem
 */

 $dados = $_REQUEST;


 
 $retorno = [ 
     'nome' => $dados['nome'], 
     'email' => $dados['email'], 
     'assunto' => $dados['assunto'],
     'mensagem' => $dados['mensagem'] 
    ];
    
echo json_encode($retorno, JSON_PRETTY_PRINT);