# CRUD Application

Bem-vindo ao repositório do meu CRUD (Create, Read, Update, Delete) desenvolvido utilizando PHP, HTML, CSS, XAMPP e MySQL! Este projeto foi criado com o objetivo de demonstrar minhas habilidades em desenvolvimento web e manipulação de banco de dados. A seguir, você encontrará uma visão geral do projeto, instruções de instalação e uso, bem como uma descrição das funcionalidades principais.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação do lado do servidor para manipulação de dados e lógica de negócio.
- **HTML**: Linguagem de marcação para estruturação do conteúdo web.
- **CSS**: Folhas de estilo para a apresentação visual da aplicação.
- **XAMPP**: Pacote de software que inclui Apache (servidor web) e MySQL (sistema de gerenciamento de banco de dados).

## Funcionalidades do CRUD

- **Create**: Adicionar novos registros ao banco de dados.
- **Read**: Visualizar registros existentes no banco de dados.
- **Update**: Editar e atualizar registros existentes.
- **Delete**: Remover registros do banco de dados.

## Instalação

Siga os passos abaixo para configurar e executar o projeto em sua máquina local:

1. **Clone o Repositório**
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Instale o XAMPP**
   - Baixe e instale o XAMPP a partir do [site oficial](https://www.apachefriends.org/index.html).

3. **Configure o Banco de Dados**
   - Inicie o XAMPP e ative os módulos Apache e MySQL.
   - Acesse o phpMyAdmin através do endereço `http://localhost/phpmyadmin/`.
   - Crie um banco de dados para o projeto.
   - Crie a Tabela cliente contendo:
    ```sql
    CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(200),
    cpf VARCHAR(20),
    email VARCHAR(200)
    );

4. **Configure o Projeto**
   - No diretório do projeto, localize e edite o arquivo `conexao.php` com as informações de acesso ao banco de dados:
     ```php
     <?php
     $servername = "localhost";
     $username = "seu_usuario";
     $password = "sua_senha";
     $dbname = "nome_do_banco_de_dados";
     ?>
     ```

5. **Execute o Projeto**
   - Mova o diretório do projeto para a pasta `htdocs` do XAMPP (`C:\xampp\htdocs\` no Windows ou `/opt/lampp/htdocs/` no Linux).
   - Acesse o projeto através do navegador pelo endereço `http://localhost/seu-projeto/`.

## Como Usar

1. **Criar um Novo Registro**
   - Acesse a página de criação e preencha o formulário com os dados necessários.
   - Clique em "Salvar" para adicionar o registro ao banco de dados.

2. **Visualizar Registros**
   - Acesse a página principal para ver a lista de registros armazenados.

3. **Editar um Registro**
   - Na lista de registros, clique em "Editar" ao lado do registro que deseja modificar.
   - Atualize as informações e clique em "Salvar" para aplicar as mudanças.

4. **Excluir um Registro**
   - Na lista de registros, clique em "Excluir" ao lado do registro que deseja remover.
   - Confirme a exclusão para deletar o registro do banco de dados.

## Estilização com CSS

A aplicação utiliza CSS para melhorar a aparência e usabilidade. Os estilos são definidos no arquivo `style.css`, que é referenciado em todas as páginas HTML. O CSS é usado para:

- Estilizar formulários e botões.
- Melhorar a apresentação de tabelas e listas de dados.
- Aplicar temas de cores e fontes para uma interface mais agradável.


## Imagens

### HOME
![image](https://github.com/LucasBorgesDeCarvalho/CRUD-PHP/assets/105558309/6b34f462-0541-4934-89a4-ebfd6971d99c)

### CADASTRO
![image](https://github.com/LucasBorgesDeCarvalho/CRUD-PHP/assets/105558309/94cc2c09-beb3-4ed9-9de1-26a1bccab6ce)

### TABELA DE VISUALIZAÇÃO
![image](https://github.com/LucasBorgesDeCarvalho/CRUD-PHP/assets/105558309/08d663e8-e995-4cab-b9aa-633e3fba66ba)

### EDITAR
![image](https://github.com/LucasBorgesDeCarvalho/CRUD-PHP/assets/105558309/87a8bc36-d715-4519-ab6b-66fa8f41d9c2)

