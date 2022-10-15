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

    public function add(\App\Entities\Contato $entity): bool{

        //die(var_dump($entity));

        $sql  = ' INSERT INTO contatos (id, nome, email, assunto, mensagem) ';
        $sql .= ' VALUES(?,?,?,?,? ) ' ;

        $stm = $this->con->prepare($sql);

        $stm->bindValue(1, $entity->getId());
        $stm->bindValue(2, $entity->getNome());
        $stm->bindValue(3, $entity->getEmail());
        $stm->bindValue(4, $entity->getAssunto());
        $stm->bindValue(5, $entity->getMensagem());

        $inserted = $stm->execute();

        //die(var_dump($inserted));

        // return [
        //     'success' => $inserted,
        //     'data' => [],
        //     'message' => $inserted ? 'registro salvo com sucesso' : 'não foi possível incluir o registro'
        // ];

        return $inserted;
    }

    public function update(\App\Entities\Contato $entity): bool{
           //die(var_dump($entity));

           $sql  = ' UPDATE contatos                             
                            SET nome = ? , 
                            email = ? , 
                            assunto = ?, 
                            mensagem = ? ';

           $sql .= ' WHERE id = ? ' ;
              
           $stm = $this->con->prepare($sql);
   
           $stm->bindValue(1, $entity->getNome());
           $stm->bindValue(2, $entity->getEmail());
           $stm->bindValue(3, $entity->getAssunto());
           $stm->bindValue(4, $entity->getMensagem());
           $stm->bindValue(5, $entity->getId());
   
           $updated = $stm->execute();
   
           //die(var_dump($inserted));
   
        //    return [
        //        'success' => $updated,
        //        'data' => [],
        //        'message' => $update ? 'registro salvo com sucesso' : 'não foi possível incluir o registro'
        //    ];
   
           return $updated;
    }

    public function delete($id){
        $sql  = ' DELETE FROM contatos '; 
        $sql .= ' WHERE id = ? ' ;

        $stm = $this->con->prepare($sql);
        $stm->bindValue(1, $id);

        $deleted = $stm->execute();


         return json_encode([
               'success' => $deleted,
               'data' => [],
               'message' => $deleted ? 'registro excluído com sucesso' : 'não foi possível excluir o registro'
           ]);

        //return $updated;      
    } 

 }