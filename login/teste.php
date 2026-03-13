<?php

require 'Usuario.class.php';

$usuario = new Usuario();
$conecta = $usuario->conn();

if( $conecta ){
   $user = $usuario->insertUser("Beatriz Freitas", "beatriz freitas@gmail.com", 2309 );
   if($user){
    echo "<h1>Usuario cadastrado com Sucesso!";
   }else{
    echo "<h1>Erro ao cadastrar o Usuario!";
   } 


}else{
    echo "<h1>Erro ao conectar. Tente mais tarde!";
}