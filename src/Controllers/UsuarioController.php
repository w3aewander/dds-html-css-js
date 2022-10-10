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
    
        return $this->model->getAll("usuarios");
    }

 }
