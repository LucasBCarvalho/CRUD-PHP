<?php
require_once 'conexao/Conexao.php';

class ClienteDAO{

    /**
     * Método para cadastrar um novo cliente no banco de dados.
     * 
     * @param ClienteDTO $clienteDTO O objeto ClienteDTO contendo os dados do cliente a ser cadastrado.
     * @return bool True se o cliente foi cadastrado com sucesso, False caso contrário.
     */
    public function cadastrarCliente(ClienteDTO $clienteDTO){
        try{
            $conexao = Conexao::conexao();

            $nome = $clienteDTO->getNome();
            $cpf = $clienteDTO->getCpf();
            $email = $clienteDTO->getEmail();

            $sql = "INSERT INTO cliente (nome, cpf, email) 
                    VALUES (:nome, :cpf, :email)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            return true;
        }catch(PDOException $exc){
            // Em caso de erro, exibe a mensagem de exceção
            echo $exc->getMessage();
            return false;
        }
    }

    /**
     * Método para listar todos os clientes cadastrados no banco de dados.
     * 
     * @return array|bool Um array contendo os clientes cadastrados ou False em caso de erro.
     */
    public function listarClientes(){
        try{
            $conexao = Conexao::conexao();

            $sql = "SELECT id_cliente, nome, cpf, email FROM cliente";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $clientes;
        }catch(PDOException $exc){
            // Em caso de erro, exibe a mensagem de exceção
            echo $exc->getMessage();
            return false;
        }
    }

    /**
     * Método para listar um cliente específico pelo seu ID.
     * 
     * @param int $idCliente O ID do cliente a ser buscado.
     * @return array|bool Um array contendo os dados do cliente encontrado ou False se o cliente não foi encontrado.
     */
    public function listarClienteById($idCliente){
        try{
            $conexao = Conexao::conexao();
            $sql = "SELECT id_cliente, nome, cpf, email FROM cliente WHERE id_cliente = :id_cliente";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id_cliente", $idCliente);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cliente;

        }catch(PDOException $exc){
            // Em caso de erro, exibe a mensagem de exceção
            echo $exc->getMessage();
            return false;
        }
    }

    /**
     * Método para excluir um cliente do banco de dados pelo seu ID.
     * 
     * @param int $idCliente O ID do cliente a ser excluído.
     * @return bool True se o cliente foi excluído com sucesso, False caso contrário.
     */
    public function excluirCliente($idCliente){
        try{
            $conexao = Conexao::conexao();

            // Verifique se o ID do cliente é válido
            if (!is_numeric($idCliente) || $idCliente <= 0) {
                echo "ID do cliente inválido.";
                return false;
            }

            // Preparar a consulta SQL para excluir o cliente
            $sql = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id_cliente", $idCliente, PDO::PARAM_INT);

            // Executar a declaração SQL
            $stmt->execute();

            // Verifique se alguma linha foi afetada
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                echo "Nenhum cliente encontrado com o ID especificado.";
                return false;
            }
        }catch(PDOException $exc){
            // Em caso de erro, exibe a mensagem de exceção
            echo $exc->getMessage();
            return false;
        }
    }

    /**
     * Método para atualizar os dados de um cliente no banco de dados.
     * 
     * @param ClienteDTO $clienteDTO O objeto ClienteDTO contendo os novos dados do cliente.
     * @return bool True se os dados do cliente foram atualizados com sucesso, False caso contrário.
     */
    public function atualizarCliente(ClienteDTO $clienteDTO){
        try{
            $conexao = Conexao::conexao();
    
            // Obtém os dados do cliente do objeto ClienteDTO
            $idCliente = $clienteDTO->getIdCliente();
            $nome = $clienteDTO->getNome();
            $cpf = $clienteDTO->getCpf();
            $email = $clienteDTO->getEmail();
    
            // Prepara a consulta SQL para atualizar o cliente
            $sql = "UPDATE cliente 
                    SET nome = :nome, cpf = :cpf, email = :email 
                    WHERE id_cliente = :id_cliente";
    
            // Prepara e executa a declaração SQL
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id_cliente", $idCliente);
    
            $stmt->execute();
    
            // Redireciona para a página de listar clientes após a atualização bem-sucedida
            header("Location: listarClientes.php?message=Cliente atualizado com sucesso");
            exit(); // Certifique-se de sair após o redirecionamento para evitar que o código continue executando
    
        }catch(PDOException $exc){
            // Em caso de erro, exibe a mensagem de exceção
            echo $exc->getMessage();
            return false;
        }
    }
}
?>
