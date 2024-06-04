<h1>Usuários<h1>
<hr>
<div>
    <table style="top:40px;">
        <thead>
            <tr>
                <th>Login</th>
                <th>Permissão</th>
                <th><a href="cadUsuario">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //importa o UsuarioController.php
            require_once '../controller/usuarioController.php';
            //chama uma funçao php que permite informar a classe e o método que será acionado
            $usuarios = call_user_func(array('UsuarioController','listar'));
            //verifica se houve algum retorno
            if (isset($usuarios) &&  !empty($usuarios)){
                foreach($usuarios as $usuario){
                    ?>
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado -->
                        <td><?php echo $usuario->getLogin(); ?></td>
                        <td><?php echo $usuario->getPermissao(); ?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $usuario->getId();?>">Editar</a>
                            <a href="index.php?action=excluir&id=<?php echo $usuario->getId();?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            else{
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>