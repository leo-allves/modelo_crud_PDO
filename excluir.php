<?php
#PUXANDO CONFIG A CONEXÃO
require 'config.php';
#PUXANDO O USUARIO DAO
require './dao/UsuarioDaoMysql.php';
#Instanciando classe UsuarioDaoMysql passando conexão $pdo
$usuarioDao = new UsuarioDaoMysql($pdo);

#PEGANDO O ID
$id = filter_input(INPUT_GET, 'id');

#VERIFICANDO SE FOI ENVIADO ALGUM DADO
if($id){ //se tiver id
    //manda pro delete
    $usuarioDao->delete($id);
}
//apos mandar pro delete() e deletar retornar para
header("location: index.php");
exit;
