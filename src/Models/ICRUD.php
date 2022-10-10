<?php
/**
 * Interface: CRUD - create, retrieve, update and delete
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Models;


 interface ICRUD {

    //C - create
    public function add(string $table, Array $fields = []) : bool;
    //R - Retrieve:
    public function getAll(string $obj): Array;
    public function findByEmailOrName(string $toSearch);
    public function findById(int $id);
    //U - Update:
    public function update(string $table, Array $fields = []): Array;
    //D - delete:
    public function delete(int $id): bool;

 }