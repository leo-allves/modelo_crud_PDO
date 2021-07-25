<?php
#PUXANDO CONFIG A CONEXÃO
require 'config.php';
#PUXANDO O USUARIO DAO
require './dao/UsuarioDaoMysql.php';

#Instanciando classe UsuarioDaoMysql passando conexão $pdo
$usuarioDao = new UsuarioDaoMysql($pdo);


//UPDATE
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//verificar se está certo se não retornar para adicionar.php
if ($id && $nome && $email) {

    //UPDATE
    #pego ID
    $usuario = $usuarioDao->findById($id);
    #pegando do banco e alterando
    $usuario->setNome($nome);
    $usuario->setEmail($email);

    //pego o $usuario e mando para update
    $usuarioDao->update($usuario);
    //depois do update cai pro index
    header('location: index.php');
    exit;

} else{
    header("location: editar.php?id=".$id);
    exit;
}

