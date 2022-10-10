<?php
/**
 * 
 * Classe para CRUD básico
 * 
 */

 namespace App\Persistence;
 use \App\Persistence\Conexao as Conexao;

 class CRUD  {

    protected Conexao $con;

    public function __construct(){
          $this->con = Conexao::getInstance();
    }

    /**
     * Exibe uma lista de registros
     * 
     * @param $table
     * @return []
     * 
     */
    public function getAll(string $table): Array{

        $arr_obj = [];

        return [];
    }

    /**
     * Adicionar um novo registro 
     * @param $record par chave-valor para inserção na tabela correspondete
     */
    public function add(string $table, array $record=[]): bool{
        $password = password_hash('123456', PASSWORD_DEFAULT);
        return false;
    }

    public function delete(int  $id): bool{
          return false;
    }

    public function show($id){
        $obj = [];

        return $obj;
    }

    /**
     * Verifica se o id existe no sistema
     * 
     * @param int $id
     * @return $obj
     * 
     */
    public function exists(int $id){

    }

    /**
     * Pesquisar registro por email ou pelo nome fornecidos em um vetor
     * retorna um array  com a lista de objetos encontrados
     * @param $table, $toSearch a tabela e um array contendo os campos que se deseja encontrar.
     * @return [] 
     */
    public function findByEmailOrName(string $table, Array $toSearch =[]): Array{
  
        $arr_obj = [];

        return $arr_obj;
    }

 }