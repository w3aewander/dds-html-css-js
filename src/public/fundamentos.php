<?php
/**
 * Fundamentos PHP
 */

 //Tipagem dinâmica
//  $nome= "Wanderlei";//string  //declaração e atribuição...
//  $idade = 57;       //inteiro
//  $peso = 104.78;    //float
//  $altura = 1.85;    //float

 $nome= $_REQUEST['nome'];
 $idade = $_REQUEST['idade'];
 $peso = $_REQUEST['peso'];
 $altura = $_REQUEST['altura'];

 //printf("Nome: %s\nIdade: %d\nPeso: %8.2f\n" , $nome, $idade, $peso );

 //echo "Nome: " . $nome . "Idade: " . $idade . "peso: " . $peso ;
 //$imc = calcularIMC($peso, $altura); 
 //versão em função anônima...
 // $imc = function($nome, $peso, $altura){
 //      $ret = $peso / pow($altura, 2);
 //      return sprintf("%s tem IMC = %8.2f\n", $nome, $ret ); 
 // };
//printf("%s\n", $imc("WAnderlei", $peso, $altura));

$imc = calcularIMC($peso, $altura);
$classificacao = classificarIMC($imc);

printf("%s tem  peso=%8.2f, altura=%8.2f; e seu IMC é=%8.2f; Portanto a classificação segundo o Ministério da Saúde é %s\n",  
                $nome, $peso, $altura, $imc, $classificacao);


/**
 * Função para calcular o IMC
 * @param float $altura
 * @param float $peso
 */
function calcularIMC($peso, $altura){
  return $peso / pow($altura, 2);
}

/**
 *  Classificar o IMC
 * @param float $imc
 * @return string "classificação"
 */
function classificarIMC($imc){
   $ret = 0.0;
   if ( $imc < 18.5 ){
        $ret = "baixo peso.";    
   } else if ( $imc > 18.5 &&  $imc < 24.9 ){
        $ret = "peso normal";
   } else if ( $imc > 24.9 && $imc < 29.9){
        $ret = "excesso de peso";
   } else if ($imc > 29.9 && $imc < 34.9) {
        $ret = "obesidade classe 1";
   }  else if ( $imc > 34.9 && $imc < 39.9 ) {
        $ret =  "obesidade classe 2";
  } else if ( $imc >= 40 ) {
        $ret = "obesidade classe 3";
  }
  return $ret;
}


