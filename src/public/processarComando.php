<?php
/**
 * Processar movimento remoto 
 */


 $request = $_REQUEST['color'];

 file_put_contents('circulo.txt', $request);

 echo 'ok';