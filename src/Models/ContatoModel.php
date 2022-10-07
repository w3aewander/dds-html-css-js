<?php
/**
 * Model contato
 * 
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Models;

 use \App\Persistence\Conexao as Conexao;

 class ContatoModel  {
    
    protected  $con;
    protected \App\Entities\Contato $entity;
    
    public function __construct() {
        $this->con = Conexao::getInstance();
    }

    public function getAll(){
        $sql = 'SELECT * FROM contatos ';
        $query = $this->con->query($sql, \PDO::FETCH_OBJ);

        $data = [];
        foreach( $query->fetchAll() as $row ) { 
             $data[] = $row;
        }
        
        return $data;
    }

 }