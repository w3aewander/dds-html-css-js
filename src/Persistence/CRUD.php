<?php
/**
 * 
 * Classe para CRUD básico
 * 
 */

 namespace App\Persistence;

 abstract class CRUD {

    protected Conexao $conexao;

    public function __construct(){
          $this->conexao = Conexao.getInstance();
    }

    public function getAll($obj){}

    /**
     * Adicionar um novo registro 
     * @param $record par chave-valor para inserção na tabela correspondete
     */
    public function add(string $table, array $record=[]): bool{
        return false;
    }

    public function delete(int  $id): bool{
          return false;
    }

    public function show($id){
        $obj = [];

        return $obj;
    }

    public function exists(int $id){

    }

    /**
     * Pesquisar registro por email ou pelo nome
     * retorna um array  com a lista de objetos encontrados
     * 
     */
    public function findByEmailOrName(string $table, string $toSearch){
        
    }

 }