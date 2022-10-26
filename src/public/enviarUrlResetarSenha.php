<?php
/**
 * Solicitação de reset de senha
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 */

 $request = $_REQUEST['email'];
 $base64 = base64_encode("alterarSenha.php?email=$request");
 $url = "https://www.enderecodosite.com:9000/$base64";
 
 echo $url;