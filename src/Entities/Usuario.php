<?php
/**
 *  
 *  Entity: Usuario
 *  
 *  @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 *  @version 1.0
 *  
 */

 namespace App\Entities;

 class Usuario {
    private int $id;
    private string $nome;
    private string $email;
    private string $perfil;
    private string $senha;


    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;
    }

    

    /**
     * Get the value of nome
     */ 
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome(string $nome)
    {
        $this->nome = $nome;

    }

    

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    /**
     * Get the value of senha
     */ 
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    /**
     * Get the value of perfil
     */ 
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }
 }