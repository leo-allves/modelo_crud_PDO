<?php
require 'config.php';

#PEGANDO O ID
$id = filter_input(INPUT_GET, 'id');

#VERIFICANDO SE FOI ENVIADO ALGUM DADO
if($id){ //se tiver dados

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

}

header("location: index.php");
exit;
