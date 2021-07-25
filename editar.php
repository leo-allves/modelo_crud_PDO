<?php
#PUXANDO CONFIG A CONEXÃO
require 'config.php';
#PUXANDO O USUARIO DAO
require './dao/UsuarioDaoMysql.php';

#Instanciando classe UsuarioDaoMysql passando conexão $pdo
$usuarioDao = new UsuarioDaoMysql($pdo);


 // recebera info. do user
$usuario = false;
#PEGANDO O ID
$id = filter_input(INPUT_GET, 'id');

#VERIFICANDO SE FOI ENVIADO ALGUM DADO
if($id){ //se tiver dados
    //verificando se id existe vai substituir ou por false ou pela instancia
     $usuario = $usuarioDao->findById($id);
}
if($usuario === false) {
    header("location: index.php");
    exit;
}
//SE passar daqui e porque achou
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
    <!-- mandando o id via hidden para editar -->
    <input type="hidden" name="id" value="<?=$usuario->getId();?>">
    <label for="">
        Nome: <br>
        <input type="text" name="nome" value="<?=$usuario->getNome();?>">
    </label>

    <br><br>

    <label for="">
        E-mail: <br>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>">
    </label>
    
    <br><br>

    <button type="submit">Salvar</button>

</form>