<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    #RECEBENDO O PDO POR INJEÇÂO DE DEPENDENCIA
    private $pdo;

    //mandar PDO que esta fazendo a manipulação o $driver ou $engine
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    #FAZENDO A IMPLEMENTAÇÃO

    //ADD = CREATE - recebe o obj da classe usuario 
    public function add(Usuario $u) {
        //add recebe o usuario e faz uma adição no BD
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute(); //executo e inseriu

        //add - $this->pdo->lastInsertId() - pega o ultimo id que foi iserido nessa requisição
        $u->setId($this->pdo->lastInsertId()); //adiciona o id do usuario que acabou de ser add
        return $u;


    }

    //READ - retorna uma lista de varios objetos da classe Usuario de todos que ele achar
    public function findAll() {
        $array = [];

        # 1º uso PDO para fazer a consulta
        $sql = $this->pdo->query("SELECT * FROM usuarios");

        # 2º verifico SE teve algum item
        if($sql->rowCount() > 0){

            //se tiver dados armazenar em $data 
            $data = $sql->fetchAll();

            //criando foreach nos dados que recebi para criar os obejetos
            foreach($data as $item){

                //crio um obj preencho ele e jogo no array
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);

                //agora pego meu $array criado e jogo meu objeto dentro e retorno ele
                $array[] = $u;
            }

        }


        return $array;
    }

    //READ
    public function findByEmail($email) {
        #IMPLEMENTAÇÃO se acho alguma coisa inseri - procedimento adicionar_action.php

        #CRIANDO - RETORNAR O PROPIO USUARIO OU FALSE
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        //associando 1º para ao 2º param
        $sql->bindValue(':email', $email);
        $sql->execute;

        //SEele achou algum usuario
        if($sql->rowCount() > 0){
            //montar obj
            $data = $sql->fetch();
            
            //criando obj
            $u = new Usuario();
            $u->setId(['id']);
            $u->setNome(['nome']);
            $u->setEmail(['email']);

            //SE achou retorne o obj
            return $u;
        }else {
            //se não achou
            return false;
        }


    }

    //READ - procurando um usuario, encontrando atraves do ID - ou pode ser por nome ou coisa do tipo
    public function findById($id) {

    }

    //UPDATE - recebe um obj de usuario com os dados ja atualizados, fara o processo de atualização no BD
    public function update(Usuario $u) {

    }

    //DELETE - pega o id e deleta
    public function delete($id) {

    }
}


