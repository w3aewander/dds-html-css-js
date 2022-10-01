<?php
/**
 * Classe para CRUD básico
 */

 namespace App\Persistence;

 class CRUD {

    private $conexao;

    public function __construct(){
          $this->conexao = Conexao.getInstance();
    }

    public function getAll($table, $arr_fields = []){

    }

    public function __set(string $field, $value){
        $this->$field = $value;
    }

    public function __get($field){
        return $this->$field;
    }

 }