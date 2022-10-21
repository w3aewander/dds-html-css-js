<?php
/**
 *  API - Usuario
 */

require __DIR__ . '/../../vendor/autoload.php';

header('Content-Type: Application/json; charset=UTF-8');

ini_set('display_errors', TRUE);
ini_set('error_reporting', E_ALL|E_CORE_WARNING);

$method = $_SERVER['REQUEST_METHOD'];   
$usuarioController = new \App\Controllers\UsuarioController();
$entity = new \App\Entities\Usuario;

$usuarios = "";

switch ($method){
    
    case 'GET':
        $usuarios = $usuarioController->getAll("usuarios");        
        echo $usuarios; 
    break;

    case 'POST':
        $body = $_REQUEST;

        //die(var_dump($body));

        $entity->setNome( $body['nome']);
        $entity->setEmail( $body['email']);
        $entity->setPerfil( $body['perfil']);
        $entity->setSenha( $body['senha']);
        
        $saved = $usuarioController->add($entity);

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
        $entity->setPerfil( $body['perfil']);

        $updated = $contatoController->update($entity);

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
       
        
        $deleted = $usuarioController->delete($id);
        
        
        echo json_encode([
            'success'=>$deleted,
            'data' => [],
            'message' => $deleted ? 'registro excluído com sucesso' : 'não foi possível excluir o registro.'
     ]);
    break;
        
}


