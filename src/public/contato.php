<?php
/**
 *  Testar a classe contato..
 */

require __DIR__ . '/../../vendor/autoload.php';

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

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
        echo $contatos;
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

        // return [
        //        'success'=>$saved,
        //        'data' => [],
        //        'message' => $saved ? 'registro incluído com sucesso' : 'não foi possível incluir o registro.'
        // ];

        echo json_encode([
               'success'=>$saved,
               'data' => [],
               'message' => $saved ? 'registro incluído com sucesso' : 'não foi possível incluir o registro.'
        ]);

    break;

    case 'PUT':        

        parse_str(file_get_contents("php://input"), $_PUT);

	    foreach ($_PUT as $key => $value){
		    unset($_PUT[$key]);
		    $_PUT[str_replace('amp;', '', $key)] = $value;
        }
        
        $_REQUEST = array_merge($_REQUEST, $_PUT);

        $body = $_REQUEST;

        //die(var_dump($body));

        $entity->setId( $body['id']);
        $entity->setNome( $body['nome']);
        $entity->setEmail( $body['email']);
        $entity->setAssunto( $body['assunto']);
        $entity->setMensagem( $body['mensagem']);

        $updated = $contatoController->update($entity);

         //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );
        
        //return $updated;
        //echo $update;

        echo json_encode([
            'success'=>$updated,
            'data' => [],
            'message' => $updated ? 'registro atualizado com sucesso' : 'não foi possível atualizar o registro.'
        ]);

    break;

    case 'DELETE':
        
        parse_str(file_get_contents("php://input"), $_DELETE);
        
	    foreach ($_DELETE as $key => $value){
            unset($_DELETE[$key]);
		    $_DELETE[str_replace('amp;', '', $key)] = $value;
        }
        
        $_REQUEST = array_merge($_REQUEST, $_DELETE);
        $id = $_REQUEST['id'] ?? "0";
       
        
        $deleted = $contatoController->delete($id);
        //echo json_encode( $contatos); //, JSON_PRETTY_PRINT );
       
        
        echo json_encode([
            'success'=>$deleted,
            'data' => [],
            'message' => $deleted ? 'registro excluído com sucesso' : 'não foi possível excluir o registro.'
     ]);
    break;
        
}

//print($contatos);

