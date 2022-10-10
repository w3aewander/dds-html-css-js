<?php
/**
 *  Testar a classe contato..
 */

require __DIR__ . '/../../vendor/autoload.php';

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json; charset=UTF-8');

ini_set('display_errors', TRUE);
ini_set('error_reporting', E_ALL|E_CORE_WARNING);

$method = $_SERVER['REQUEST_METHOD'];
$contatoController = new \App\Controllers\ContatoController();
$entity = new \App\Entities\Contato;

$contatos = "";

switch ($method){
    
    case 'GET':
        $contatos = $contatoController->getAll();        
        //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );
        //echo $contatos;
    break;

    case 'POST':
        $body = $_REQUEST;
        //die( var_dump($body) );

        $entity->setId( $body['id']);
        $entity->setNome( $body['nome']);
        $entity->setEmail( $body['email']);
        $entity->setAssunto( $body['assunto']);
        $entity->setMensagem( $body['mensagem']);

        //die( var_dump($entity) );
        $saved = $contatoController->add($entity);
         //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );
        
        //die(var_dump($saved));

        return [
               'success'=>$saved,
               'data' => [],
               'message' => $saved ? 'registro incluído com sucesso' : 'não foi possível incluir o registro.'
        ];

    break;

    case 'PUT':        
        $body = $_REQUEST;

        $contatos = $contato->update($body);
         //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );
        
    break;

    case 'DELETE':
        $id = $_REQUEST['id'] ?? "0";
        $contatos = $contato->delete();
         //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );

    break;
        
}

print($contatos);

