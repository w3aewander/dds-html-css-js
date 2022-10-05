<?php
/**
 *  Script de conexão com o banco de dados mysql com PDO
 *  @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 *  @version 0.1
 */

 namespace App\Persistence;

 //ini_set(  'memory_limit', 0 );

 class Conexao {

    private  static  $instance;
    private function __construct() {}

    public static function getInstance() {
    //Credenciais para o banco
    //boa prática seria armazenar as credenciais em um arquivo separaco
    //ler o arquivo config.json na raiz do projeto.
 
    $json = file_get_contents( __DIR__ . '/../../config.json');
    
    // $json = '{
    //   "dbhost":"localhost",
    //   "dbase": "dds311",
    //   "dbuser":"root",
    //   "dbpass":"r00t@Abc" 
    //  }';

    $arr_json =  json_decode($json);

    //die(var_dump($arr_json->dbhost));

    // $dbhost = 'localhost';//$arr_json->dbhost;
    // $dbname = 'dds311';//$arr_json->dbase;
    // $dbuser = 'root';//$arr_json->dbuser;
    // $dbpwd  = 'r00t@Abc';//$arr_json->dbpass;

    $dbhost = $arr_json->dbhost;
    $dbname = $arr_json->dbase;
    $dbuser = $arr_json->dbuser;
    $dbpwd  = $arr_json->dbpass;

    $options    = [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_EMULATE_PREPARES => false
    ];

    //String de conexão com o banco
    $dsn  = sprintf("mysql:host=%s;dbname=%s", $dbhost, $dbname, $options);

    //se não houver uma conexão com o banco, instancie uma...
     if ( ! self::$instance ){
        self::$instance = new \PDO($dsn, $dbuser, $dbpwd);
     }
     return self::$instance;
   }
}


