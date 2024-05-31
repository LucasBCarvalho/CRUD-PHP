<?php
require_once '../dao/ClienteDAO.php';
require_once '../dto/ClienteDTO.php';

$sucesso = null;

// Verifica se o ID do cliente está definido na URL e não está vazio
if (isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
    $clienteDAO = new ClienteDAO();
    $idCliente = $_GET['id_cliente'];
    
    // Obtém o cliente pelo ID
    $cliente = $clienteDAO->listarClienteById($idCliente);

    // Se o cliente não for encontrado, redireciona para uma página de erro ou exibe uma mensagem
    if (!$cliente) {
        die("Cliente não encontrado.");
    }
} else {
    die("ID do cliente não fornecido.");
}

// Se o formulário foi submetido (método POST), atualiza o cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    // Cria um novo objeto ClienteDTO com os dados atualizados
    $clienteDTO = new ClienteDTO();
    $clienteDTO->setIdCliente($idCliente);
    $clienteDTO->setNome($nome);
    $clienteDTO->setCpf($cpf);
    $clienteDTO->setEmail($email);

    // Chama o método atualizarCliente do ClienteDAO
    $sucesso = $clienteDAO->atualizarCliente($clienteDTO);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/editarCliente.css">
    <title>Editar Cliente</title>
</head>
<body>

    <!-- Formulário de atualização do cliente -->
    <form id="formCliente" action="" method="post">
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>">
        </div>

        <div>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" value="<?php echo htmlspecialchars($cliente['cpf']); ?>">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($cliente['email']); ?>">
        </div>

        <div>
            <input type="submit" value="Atualizar">
        </div>
    </form>

    <?php if ($sucesso): ?>
        <!-- Mensagem de sucesso -->
        <p>Cliente atualizado com sucesso!</p>
    <?php endif; ?>

</body>
</html>
