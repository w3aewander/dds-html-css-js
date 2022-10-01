<?php
/**
 * Classe ContratoController
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Controllers;

 class ContatoController extends Controller{
     private \App\Entities\Contato $entity;
     private \App\Models\ContatoModel $model;
    
     public function __construct(){
        parent::__construct();
        $this->model = new \App\Models\ContatoModel();
        
     }

     /**
      * Obter todos os registros da base de dados
      * 
      * @return json    
      */
     public function getAll(){  
        $contatos = $this->model->getAll();
        if ( $contatos ){
            return json_encode ( ['success'=> true, 'data' => $contatos, 'message' => 'dados obtidos com sucesso.' ]);
        }

        return ( ['success'=> false, 'data' => $contatos, 'message' => 'consulta não retornou dados' ]);
     }

     public function getById($id){
        $contato = $this->model->getById($id);
         return json_encode ([
                             'success'=>$this->success, 
                             'data'=>$contato, 
                             'message' => 'registro obtido com sucesso' 
                            ]);
     }

     //Incluir um novo registro na base de dados
     public function add(Contato $contato){
        $this->model = new Contato();
       
        if ( $this->model->add($contato) ){
            $this->success = true;
            $this->data = [];
            $this->msg = 'Registro atualizado com sucesso.';
        } 

        return json_encode([
            'success'=>$this->success, 
            'data'=>$this->data,
            'message'=>$this->msg ]);
     }

     //Atualiza o contato na base de dados
     public function update(Contato $contato){
        if ( $this->model->update($contato) ){
            $this->success = true;
            $this->data = [];
            $this->msg = 'Registro atualizado com sucesso.';
        }

        return json_encode([
                             'success'=>$this->success, 
                             'data'=>$this->data,
                             'message'=>$this->msg ]);
     }

     //Excluir um novo registro na base de dados
     public function delete($id){
        if ( $this->model->delete($id) ){
            $this->success = true;
            $this->data = [];
            $this->msg = 'Registro excluído com sucesso.';
        }

        return json_encode([
                             'success'=>$this->success, 
                             'data'=>$this->data,
                             'message'=>$this->msg ]);
     }
}