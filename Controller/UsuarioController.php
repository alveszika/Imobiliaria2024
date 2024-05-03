<?php
require_once '../model/usuario.php';

class UsuarioController{
    /**
     * Salvar o usuario submetido pelo formulario
     */
    public static function salvar(){
        //cria um objeto do tipo Usuario
        $usuario = new Usuario;

        //armazena as informações do $_POST via set
        $usuario->setLogin($POST['login']);
        $usuario->setSenha($POST['senha1']);
        $usuario->setPermissao($POST['permissao']);

        //chama o método save para gravar as informações no banco de dados
        $usuario->save();
    }
    /**
    * Lista os usuários
    */
    public function listar(){
        //cria um objeto do tipo usuario
        $usuarios = new Usuario;
        //chama o método listAll()
        return $usuarios->listAll();
    }
        
}


?>
