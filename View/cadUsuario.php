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
        <input type="text" name="login" id="login"><br/>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha"><br/>
        <label for="login">Confirmação de Senha:</label>
        <input type="password" name="senha2" id="senha2"><br/>
        <label for="login">Tipo permissão:</label>
        <select name="permissao" id="permissao">
            <option value="0">**SELECIONE**</option>
            <option value="0">Admnistrador</option>
            <option value="0">Comum</option>
        </select><br/><br/>
        <input type="submit" name="btnSalvar" id="btnSalvar">
    </form>
 
    <?php
    if(isset($_POST['bnt_salvar'])){
        require_once '../control/usuarioController.php';
        call_user_func(array('usuarioController','salvar'));
    }
 
    ?>
</body>
</html>