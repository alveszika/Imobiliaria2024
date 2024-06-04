<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
</head>
<body>
    <form action="" method="post">
        <label for="login">Login:</label>
        <input type="text" class="form-control col-sm-8" name="login" id="login" value="<?php echo isset($usuario)?$usuario->getLogin():'' ?>"><br/>
        <label for="senha">Senha:</label>
        <input type="password" class="form-control col-sm-8" name="senha" id="senha" value="<?php echo isset($usuario)?$usuario->getSenha():'' ?>"><br/>
        <label for="login">Confirmação de Senha:</label>
        <input type="password" name="senha2" id="senha2"><br/>
        <label for="login">Tipo permissão:</label>
        <select name="permissao" id="permissao">
            <option value="0">**SELECIONE**</option>
            <option value="A" <?php echo isset($usuario) && $usuario->getPermissao()=='A'?'selected':'' ?>>Admnistrador</option>
            <option value="C" <?php echo isset($usuario) && $usuario->getPermissao()=='C'?'selected':'' ?>>Comum</option>
        </select><br/><br/>
        <input type="submit" name="btn_salvar" id="btn_salvar">
        
        <input type="hidden" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():''; ?>" />
    </form>
 
    <?php
    if(isset($_POST['btn_salvar'])){
        require_once '../controller/usuarioController.php';
        call_user_func(array('usuarioController','salvar'));
        header('Location: index.php?action=listar');
    }
 
    ?>
</body>
</html>