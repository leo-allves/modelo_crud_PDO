<?php
require 'config.php';

$info = []; // recebera info. do user

#PEGANDO O ID
$id = filter_input(INPUT_GET, 'id');

#VERIFICANDO SE FOI ENVIADO ALGUM DADO
if($id){ //se tiver dados

    #Buscar o ID
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    //substituir os dados
    $sql->bindValue(':id', $id);
    //executando $sql
    $sql->execute();

    #VERIFICANDO SE ACHOU ALGUMA COISA
    if($sql->rowCount() > 0){
        //fetch() vai pegar só primeiro item diferente do fech_All que pega tudo, só quero o id então é o primeiro.
        $info = $sql->fetch(PDO::FETCH_ASSOC); 

    } else {
        header("location: index.php");
        exit;
    }

}else{ //se não tiver dados
    header("location: index.php");
    exit;
}
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
    <!-- mandando o id via hidden para editar -->
    <input type="hidden" name="id" value="<?=$info['id'] ?>">
    <label for="">
        Nome: <br>
        <input type="text" name="nome" value="<?=$info['nome'] ?>">
    </label>

    <br><br>

    <label for="">
        E-mail: <br>
        <input type="email" name="email" value="<?=$info['email'] ?>">
    </label>
    
    <br><br>

    <button type="submit">Salvar</button>

</form>