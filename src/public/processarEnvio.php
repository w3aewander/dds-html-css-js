<?php
/**
 * Processar o envio da mensagem
 */

 echo "Mensagem recebida...";
 echo "Os dados recebidos foram:";


 $dados = $_REQUEST;

 //die( var_dump($dados) );

 printf("Nome: %s<br>", $dados['nome']);
 printf("Email: %s<br>", $dados['email']);
 printf("Assunto: %s<br>", $dados['assunto']);
 printf("Mensagem: %s<br>", $dados['mensagem']);
