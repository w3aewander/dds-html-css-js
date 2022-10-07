<?php
/**
 * Model contato
 * --------------------------------
 * 
 */

 namespace App\Models;


 class ContatoModel extends App\Persistence {
    
    private  $con;
    private \App\Entities $entity;
    
    public function __construct() {
        //$this->con = \App\Persistence\Conexao::getInstance();
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