# DAO - Data Acsses Object

## Ele veio para melhorar o CRUD em PDO

- Normalmente usamos classes para criar modelos
- Depois criamos objetos

### Olhando uma por um lado como classes teriamos uma tabelas atraves de uma classe

CLASSE USUARIO

### PROPIEDADES
- id
- nome
- email

### METODOS
- getId
- setId

- getNome
- setNome

- getEmail
- setEmail

- tudo que fosse referente ao usuario passaria por essa classe

1º Para implementar o DAO precisamos pelomenos de duas classes

- deve se seguir não a risca mais o padrão principal DAO

2º Para ter um DAO precisamos de 2 classes

- Primeira sera o propio intem mesmo o usuario
- segunda classe usuario DAO por exemplo

### CALSSE USUARIO

PROPIEDADES
- id
- nome
- email

METODOS
- getId
- setId

- getNome
- setNome

- getEmail
- setEmail

### CLASSE USUARIO DAO
- E aonde vai ter o nosso CRUD
- Onde fazemos inserção, pegamos os dados, pegamos um dado só, delete, atualizar
- Ele fará todo o processo em auxilio da classe usuario nesse exemplo

### TEREMOS NA CLASSE DAO
METODOS

- add(Usuario) <- receberia uma classe usuario

PASSO 1 PARA ADD USUARIO NOVO:

- Cria a classe do novo usuario.
  
- Crio objeto do meu usuario

    $usuario = new Usuario();
    $usuario->setNome('fulano');
    $usuario->setEmail('fulano@hotmail.com');

- Jogo esse objeto para ser criado no BD

    $usuarioDAO->add($usuario);

### Para add o USUARIO
  
- crio o obejeto do usario a ser adicionado
- mando o objeto pro intermediario
- o intermediario faz a comunicação com o banco de dados

OBS: dessa maneira eu separo a comunicação do BD da aplicação como um todo

### REGRA DO DAO

- Eu tenho que ter uma CLASSE para o item especifico que eu estou manipulando
- E eu tenho que ter uma outra CLASSE especifica para manipular(intermedia)  a comunicação com BD e a classe do item que
  estou manipulando
