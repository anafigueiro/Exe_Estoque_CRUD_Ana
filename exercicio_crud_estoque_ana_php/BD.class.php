<?php

class BD {
    private $host = "localhost";
    private $dbname = "db_aula";
    private $port = 3306;
    private $usuario = "root";
    private $senha = "";
    private $db_charset = "utf8";


    public function conn(){
        $conn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port";

        return new PDO(
            $conn,
            $this->usuario,
            $this->senha,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ". $this->db_charset]
        );
    }

    public function inserir($dados){
        $conn = $this->conn();
        $sql = "INSERT INTO produto (nome_produto, preco, quantidade) VALUES (?, ?, ?);";
        $st = $conn->prepare($sql);
        $st->execute([$dados['nome_produto'], $dados['preco'],$dados['quantidade']]);
    }


    public function atualizar($dados){

        $id = $dados['id'];
        $conn = $this->conn();
        $sql = "UPDATE produto SET nome_produto=?, preco=?, quantidade=? WHERE id = $id ";
        $st = $conn->prepare($sql);
        $st->execute([$dados['nome_produto'], $dados['preco'],$dados['quantidade']]);
    }

    public function select(){
        $conn = $this->conn();
        $sql = "SELECT * FROM produto;";
        $st = $conn->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function buscar($id){
        $conn = $this->conn();
        $sql = "SELECT * FROM produto WHERE id=?;";
        $st = $conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchObject();
    }

    public function deletar($id){
        $conn = $this->conn();
        $sql = "DELETE FROM produto WHERE id = ?";
        $st = $conn->prepare($sql);
        $st->execute([$id]);
    }

    public function pesquisar($dados){

        $campo= $dados['campo'];
        $valor= $dados['valor'];

        $conn = $this->conn();
        $sql = "SELECT * FROM produto WHERE $campo LIKE ?;";
        $st = $conn->prepare($sql);
        $st->execute(["%".$valor."%"]);

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function login($dados){
        $conn = $this->conn();
        $sql = "SELECT * FROM produto WHERE login=? AND senha=?;";
        $st = $conn->prepare($sql);
        $st->execute([$dados['login'], $dados['senha']]);

        return $st->fetchObject();
    }

}