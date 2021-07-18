<?php
//CRUD
require 'config.php';

$lista = [];

# pegando os usuarios com uma busca
$sql = $pdo->query("SELECT * FROM usuarios");

# verificar SE existe algum usuario exibir na tabela
if($sql->rowCount() > 0){
    #PEGAR MEUS INTENS E ADD em LISTA
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC); //cria um array joga os dados dentro de lista
    #FAZER UM LOOP PRA PEGAR OS DADOS EM BAIXO O FOREACH PARA RECEBER OS DADOS
}
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E_MAIL</th>
        <th>AÇÕES</th>
    </tr>

    <!-- 
        //essa forma de foreach com php me permit abrir e fechar o PHP aonde eu quiser

        # após verificar SE existe algum usuario exibir na tabela com foreach 
    -->

    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?= $usuario['id'] ?></td> 
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td>
                <!-- Ações -->
                <a href="editar.php?id=<?= $usuario['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
            </td>
        </tr>   
    <?php endforeach; ?>
    
</table>






