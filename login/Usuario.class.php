<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    
    private $pdo; public function checkUser( $email ) {
        #criar a variavel com a consulta sql
        $sql  = "SELECT email FROM usuarios WHERE email = :e";
        
        #chamar o metodo prepare passando a consulta
        $stmt = $this->pdo->prepare($sql);

        #para cada apelido um bindValue:
        $stmt->bindValue(":e", $email);

        #executar o comando
        $stmt->execute();
        
        #SELECT
        return $stmt->rowCount() > 0;
    }
   
    public function checkPass ( $email, $senha ) {
        #criar a variavel com a consulta sql
        $sql  = "SELECT email FROM usuarios WHERE email = :e AND senha = :s";
        
        #chamar o metodo prepare passando a consulta
        $stmt = $this->pdo->prepare($sql);

        #para cada apelido um bindValue:
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        #executar o comando
        $stmt->execute();
        
        #SELECT
        return $stmt->rowCount() > 0;
    }

    public function conn() {
        $dns  = "mysql:dbname=banco;host=localhost";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO( $dns, $user, $pass );
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function insertUser( $nome, $email, $senha ){
        # criar a variavel com a consulta sql
        $cmd = "INSERT INTO usuarios SET nome = :n , email = :e, senha = :s";
        
        # chamar o metodo prepare passando a consulta
        $object = $this->pdo->prepare($cmd);

        # para cada apelido (:) chamar o bindValue
        $object->bindValue(":n", $nome);
        $object->bindValue(":e", $email);
        $object->bindValue(":s", $senha);

        return $object->execute();

    }

}