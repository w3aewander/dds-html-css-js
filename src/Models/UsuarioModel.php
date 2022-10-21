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

 class UsuarioModel   {

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
    public function add(\App\Entities\Usuario $usuario): bool {
        
        
        // die( $usuario->getPerfil() );

        $sql  =  " INSERT INTO usuarios(nome, email, perfil, senha) ";
        $sql .= " VALUES ( ?, ?, ?, ? ) ";

        $stm = $this->con->prepare($sql);

        $senha = password_hash('123@Mudar', PASSWORD_BCRYPT); 

        $stm->bindValue(1, $usuario->getNome());
        $stm->bindValue(2, $usuario->getEmail());
        $stm->bindValue(3, $usuario->getPerfil());
        $stm->bindValue(4, $senha);

        $affecteds = $stm->execute();

        return $affecteds;
    }

    /**
     * 
     * @override
     * 
     */
    public function update(\App\Entities\Usuario $usuario): bool{
        
        $sql =  " UPDATE usuarios ";
        $sql .= " set nome= ?, email= ?, perfil=? ";
        $sql .= " WHERE id = ? ";

        $stm = $this->con->prepare($sql);

        $stm->bindValue(1, $usuario->getNome());
        $stm->bindValue(2, $usuario->getEmail());
        $stm->bindValue(3, $usuario->getPerfil());
        $stm->bindValue(4, $usuario->getId());
        
        $affecteds = $stm->execute();

        return $affecteds;
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