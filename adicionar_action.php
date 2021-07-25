<?php
#PUXANDO CONFIG A CONEXÃO
require 'config.php';
#PUXANDO O USUARIO DAO
require './dao/UsuarioDaoMysql.php';

#Instanciando classe UsuarioDaoMysql passando conexão $pdo
$usuarioDao = new UsuarioDaoMysql($pdo);


//INSERT
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//verificar se está certo se não retornar para adicionar.php
if ($nome && $email) {

    //verificando

    #IMPLEMENTAÇÃO
    if($usuarioDao->findByEmail($email) === false){ //se return false ñ achou user with email
        #add - criando novo usuario
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setEmail($email);

        //so tera id quando for criado

        #USANDO DAO
        // pegando o novo usuario e jogando no add() usando DAO criando no BD
        $usuarioDao->add($novoUsuario);

        #REDIRECIONANDO PARA index.php a "listagem"
        header("location: index.php");
        exit;

    }else {
        //se ele não achar o e-mail volta para o adicionar.php
        header("location: adicionar.php");
        exit;
    }

} else{
    header("location: adicionar.php");
    exit;
}

