<?php
#PUXANDO CONFIG A CONEXÃO
require 'config.php';
#PUXANDO O USUARIO DAO
require './dao/UsuarioDaoMysql.php';

#Instanciando classe UsuarioDaoMysql passando conexão $pdo
$usuarioDao = new UsuarioDaoMysql($pdo);

#PEGANDO A LISTA DE USUARIOS - findAll está em UsuarioDaoMysql.php
//ele vai retornar pra mim um array com todos os itens do array vão ser objetos da classe usuario
$lista = $usuarioDao->findAll();
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>

    <!-- 
        //pegando os objetos do array no meu findAll() e utilizando no meu formulario
    -->

    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?=$usuario->getId();?></td> 
            <td><?=$usuario->getNome();?></td>
            <td><?=$usuario->getEmail();?></td>
            <td>
                <!-- Ações -->
                <a href="editar.php?id=<?=$usuario->getId();?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
            </td>
        </tr>   
    <?php endforeach; ?>
    
</table>






