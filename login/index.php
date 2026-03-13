<?php
require'Usuario.class.php';

$usuario = new Usuario();

$con = $usuario->conecta();

if($con){
    $email = "kiki@gmail.com";
    $teste = $usuario->procurarEmail($email);

    if(!$teste){
        $sucesso = $usuario->cadastraUsuario("Quiteria", "kiki@gmail.com", "123");
        
        if($sucesso){
            echo "<script>
                    alert('Usuario cadastrado com SUCESSO')
                </script>";
        }else{
            echo "<script>
            alert('Nao consegui cadastrar o Usuario')
        </script>";
        }
    }else{
        echo "<script>
        alert('Esse usuario ja existe')
    </script>";
    }

}

