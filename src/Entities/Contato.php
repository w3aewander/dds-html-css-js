<?php
/**
 * Model contato
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 0.1
 * 
 */

 //Entity Contato
 namespace App\Entities;

 class Contato {

    private int $id;
    private string $nome;
    private string $email;
    private string $assunto;
    private string $mensagem;

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;
    }

    

    /**
     * Get the value of nome
     */ 
    public function getNome(){
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome){
        $this->nome = $nome;
    }

    

    /**
     * Get the value of email
     */ 
    public function getEmail(){
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email){
        $this->email = $email;
    }

    

    /**
     * Get the value of assunto
     */ 
    public function getAssunto(){
        return $this->assunto;
    }

    /**
     * Set the value of assunto
     *
     * @return  self
     */ 
    public function setAssunto($assunto){
        $this->assunto = $assunto;
    }

    /**
     * Get the value of mensagem
     */ 
    public function getMensagem(){
        return $this->mensagem;
    }

    /**
     * Set the value of mensagem
     *
     * @return  self
     */ 
    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }
 }