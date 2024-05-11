<?php

require_once 'banco.php';
require_once '../View/Conexao.php';

class Usuario extends Banco{

    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getPermissao(){
        return $this->permissao;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function save(){
        $result = false;
        $conexao = new conexao();
        if($conn = $conexao->getConnection()){
            if ($this->id > 0){
                $query = "update usuario set login = :login, senha = :senha, permissao = :permissao where id = :id";
                $stmt = $conn->prepare($query);
                if ($stmt->execute(array(':login' => $this ->login, ':senha' => $this->senha, ':permisao' => $this->permissao, ':id' =>$this->id))){
                    $result = $stmt->rowCount();
                }
            } else {
                $query = "INSERT into usuario (id, login, senha, permissao) values (null, :login, :senha, :permissao)";
                $stmt = $conn-> prepare($query);
                if ($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, 'permissao' => $this->permissao))){
                    $result = $stmt->rowCount();

                }
            }
        }
        return $result;
    }

    public function remove($id){

    }

    public function find($id){
        $conexao = new conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * from usuario where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            $result = $stmt->fetchObject(Usuario::class);
        }else{
            $result = false;
        }
        return $result;
    }

    public function listAll(){
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConnection();
        //cria querry de seleçao
        $query = "SELECT * FROM usuario";
        //prepara a querry para a execução
        $stmt = $conn->prepare($query);
        //cria um array para receber o resultado da seleção
        $result = array();
        //executa o array
        if($stmt->execute()){
            //o resultado da busca será retornado com um objeto da classe 
            while ($rs = $stmt->fetchObject(Usuario::class)){
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }
        else{
            $result = false;
        }
        return $result;
    }

    public function count(){

    }

}

?>
