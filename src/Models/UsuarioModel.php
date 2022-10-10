<?php
/**
 * Model: Usuario
 * 
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Models;

 use \App\Persistence\Conexao as Conexao;
 use \App\Models\ICRUD;

 class UsuarioModel implements ICRUD  {

    protected  $con;
    protected \App\Entities\Usuario $usuario;


    /**
     * Método construtor padrão
     */
    public function __construct(){
        $this->con = Conexao::getInstance();
    }

    public function getAll(string $table): Array {

        $sql = sprintf("SELECT * FROM %s ", $table);
        $result = $this->con->query($sql);
      
        $records = []; 

        while ( $row = $result->fetchAll(\PDO::FETCH_OBJ)){
              $records = $row;
        }

        return $records;
    }

    /**
     * @override
     */
    public function findByEmailOrName(string $toSearch): Array{
        $usuarios = [];

        return $usuarios;
    }

    public function findById( int $id) {

    }

    /**
     * 
     * @override
     * 
     */
    public function add(string $table, Array $fields = []): Bool {
        
        return false;
    }

    /**
     * 
     * @override
     * 
     */
    public function update(string $table, Array $fields = []): bool{
        return false;
    }

    /**
     * 
     * @override
     * 
     */
    public function delete(int $id): bool {
        return false;
    }

    
 }