<?php
  abstract class Model {
    protected $table = "";//Definir nome da tabela
    protected $query = "";//Definir sql

    /*------
    FUNÇÃO PARA OBTER CONEXÃO COM BD
    -----*/
    function getConnection() {
        $username = 'postgres';
        $password = '';//Mudar senha para seu BD
        $database = 'sistemaChat';//Mudar nome do seu BD
        $host = 'localhost';
        try {
            $conn = new PDO('pgsql:host='.$host.';port=5432;dbname='.$database, $username, $password);
            return $conn;
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    /*------
    FUNÇÃO PARA ADICIONAR
    -----*/
    function create($dados) {

        if (isset($dados['id'])) {
            unset($dados['id']);
        }

        $keys = array_keys($dados);
        $campos = implode(", ", $keys);
        $valores = ":".implode(", :", $keys);

        $sql = "INSERT INTO $this->table ($campos) values ($valores) ";
        $conn = $this->getConnection();
        $setenca = $conn->prepare($sql);

        foreach($keys as $key) {
            $setenca->bindParam(":$key", $dados[$key]);
        }

        $setenca->execute();
    }

    /*------
    FUNÇÃO PARA LER DADOS
    -----*/
    function read() {
        $conn = $this->getConnection();
        
        $sql = $this->query != "" ?  $sql = $this->query : "select * from $this->table";
        $setenca = $conn->query($sql);
        $dados = $setenca->fetchAll();
        return $dados;
    }

    /*------
    FUNÇÃO PARA ATUALIZAR
    -----*/
    function update($dados) {
        $keys = array_keys($dados);
        $campos = "";

        foreach ($keys as $key) {
            if ($key != "id") {
                if ($campos != "") {
                    $campos .= ", $key=:$key";
                } else {
                    $campos = "$key=:$key";
                }
            }
        }

        $sql = "UPDATE $this->table SET $campos WHERE id=:id ";
        $conn = $this->getConnection();
        $setenca = $conn->prepare($sql);

        foreach($keys as $key) {
            $setenca->bindParam(":$key", $dados[$key]);
        }
        $setenca->execute();
    }

    /*------
    FUNÇÃO PARA DELETAR DADOS
    -----*/
    function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id=? ";
        $conn = $this->getConnection();
        $setenca = $conn->prepare($sql);
        $setenca->bindParam(1, $id);
        $setenca->execute();
    }

    /*------
    FUNÇÃO PARA ENCONTRAR USUÁRIO PELO EMAIL
    -----*/
    function getByEmail($email) {
        $sql = "SELECT * FROM $this->table WHERE email=? ";
        $conn = $this->getConnection();
        $setenca = $conn->prepare($sql);
        $setenca->bindParam(1, $email);
        $setenca->execute();
        $dados = $setenca->fetch();
        return $dados;
    }

    /*------
    FUNÇÃO PARA EXIBIR CONVERSAS
    -----*/
    function showMensagem($idDestinatario, $id){
        $sql = "SELECT * FROM mensagem WHERE fk_deusuario = ? AND fk_parausuario = ? or fk_deusuario = ? AND fk_parausuario = ? ORDER BY data;";
        $conn = $this->getConnection();
        $setenca = $conn->prepare($sql);
        $setenca->bindParam(1, $id);
        $setenca->bindParam(2, $idDestinatario);
        $setenca->bindParam(3, $idDestinatario);
        $setenca->bindParam(4, $id);
        $setenca->execute();
        $dados = $setenca->fetchAll();
        return $dados;
    }

    /*------
    FUNÇÃO PARA VALIDAR CREDENCIAIS DO USUÁRIO
    -----*/
    function validarLogin($dados){
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $conn = $this->getConnection();
        $setenca = $conn->prepare($sql);
        $setenca->bindParam(':email', $dados['email']);
        $setenca->execute();
        $resultado = $setenca->fetch();

        if($resultado != false){
            $senha = $dados['senha'];
            $hash_senha = $resultado['senha'];
            if(password_verify($senha, $hash_senha)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
  }
 ?>
