<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

echo "O nome digitado foi...: $nome <br>";
echo "O email digitado foi...: $email <br>";
echo "A senha digitada foi...: $senha";

require 'Usuario.class.php';
$usuario = new Usuario();
$conecta = $usuario->conn();
if( $conecta){
    $user = $usuario->checkUser($email);
    if ( !$user ){
          $user = $usuario->insertUser( $nome, $email, $senha );
    if ( $user ){
        echo "Usuario cadastrado com Sucesso!";
    }else{
        echo "Erro ao cadastrar o Usuario!";

    }

        echo "Banco indisponivel. Tente mais tarde!";
    }
    exit();
}