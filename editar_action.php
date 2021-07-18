<?php
require 'config.php';


//UPDATE
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//verificar se está certo se não retornar para adicionar.php
if ($id && $nome && $email) {

    //UPDATE usuarios SET nome = '...', email = '...' WHERE id = '...';
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email',  $email);
    $sql->bindValue(':id',  $id);
    $sql->execute();

    header('location: index.php');
    exit;

    
} else{
    header("location: adicionar.php");
    exit;
}

