<?php
/** 
 * Classe UsuarioController
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Controllers;

 use \App\Models\UsuarioModel as UsuarioModel;
 /**
  * 
  */
 class UsuarioController  extends Controller {

    public function __construct(){
        $this->model = new UsuarioModel();
    }
    public function getAll(){
    
        $usuarios = $this->model->getAll("usuarios");
       

        if ( $usuarios ){
            return json_encode (['success'=> true, 
               'data' => $usuarios, 
               'message' => 'dados obtidos com sucesso.' ]);
        }

        return ( ['success'=> false, 
                  'data' => $usuarios, 
                  'message' => 'consulta não retornou dados' ]);
    }

    public function add(\App\Entities\Usuario $usuario): bool{

        $affecteds = $this->model->add($usuario);

        return $affecteds;

    }

 }
