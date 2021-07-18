<?php
//conexão
require 'config.php';


//INSERT
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//verificar se está certo se não retornar para adicionar.php
if ($nome && $email) {

    #VERIFICANDO SE JÀ EXISTE  1 EMAIL CRIANDO ANTES DE INSERIR O USUARIO
    //buscando na tabela se existe algum email criado
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();


    #VERIFICAR SE EXISTE ALGUM EMAIL (O certo e não retornar nada)
    //$sql->rowCount() -quantos registros vieram dessa consulta
    //SE a quant. de registros for 0 execute o INSERT
    if($sql->rowCount() == 0){ 

        # add usuario

        #MONTANDO A QUERY
        //jeito certo - montando um tamplete que depois vou substituir os valores
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        
        #INSERINDO DADOS
        //bindValue - passo parametros 1º quem eu quero modificar, 2º a variavel $nome
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email',$email);

        #EXECUTANDO A QUERY
        $sql->execute();

        #APÓS ADD RETORNAR A INDEX
        header("location: index.php");
        exit;   
    }else{
        header("location: adicionar.php");
        exit;
    }

} else{
    header("location: adicionar.php");
    exit;
}

