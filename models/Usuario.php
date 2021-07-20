<?php
#CRIANDO A CLASSE QUE VAI TRABALHAR COM OS OBJETOS
class Usuario {
    private $id;
    private $nome;
    private $email;

    public function getId() {
        return $this->id;
    }
    public function setId($i) {
        //trim() organiza os espaços| pratica no set
        $this->id = trim($i);  
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($n) {
        //tratando espaços com trim
        //deixando cada nome com a 1º letra maiuscula ucwords()
        $this->nome = ucwords(trim($n));
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($e) {
        //jogando o email todos o texto para minusculo strtolower()
        $this->email = strtolower(trim($e));
    }
}

//padronizando Dao com interface

#CRIANDO O CRUD NA INTERFACE

interface UsuarioDAO {
    //ADD = CREATE - recebe o obj da classe usuario 
    public function add(Usuario $u); 
    //READ - retorna uma lista de varios objetos da classe Usuario de todos que ele achar
    public function findAll(); 
    //READ - procurando um usuario, encontrando atraves do ID - ou pode ser por nome ou coisa do tipo
    public function findByEmail($email);
    //READ - faznedo uma busca por email
    public function findById($id);
    //UPDATE - recebe um obj de usuario com os dados ja atualizados, fara o processo de atualização no BD
    public function update(Usuario $u);
    //DELETE - pega o id e deleta
    public function delete($id);

}