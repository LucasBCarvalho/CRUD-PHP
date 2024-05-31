<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/listarClientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Listar Clientes</title>
</head>
<body>
    <h1> Clientes </h1>
    <div>
        <a class="button" href="formCadastrarCliente.php" style="margin-left: 11.7rem;">Cadastrar Cliente</a>
        <a class="button" href="http://localhost/sistema-mvc/" style="margin: 10px;">Home</a>
    </div>
    <?php
    // Exibe mensagem de sucesso ou erro, se houver
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Aviso',
                        text: '{$message}',
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                });
              </script>";
    }
    ?>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>Email</td>
            <td colspan="2">Ações</td>
        </tr>

        <?php
            require_once '../dao/ClienteDAO.php';
            $clienteDAO = new ClienteDAO();
            $clientes = $clienteDAO->listarClientes();
            
            foreach($clientes as $cliente) {
                echo "<tr>";
                echo "<td>{$cliente['id_cliente']}</td>";
                echo "<td>{$cliente['nome']}</td>";
                echo "<td>{$cliente['cpf']}</td>";
                echo "<td>{$cliente['email']}</td>";
                echo "<td>
                        <a style='display: inline-block; padding: 8px 16px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; margin: 0; margin-right: 8px;' href='formEditarCliente.php?id_cliente={$cliente['id_cliente']}'>Editar</a>
                        <a style='display: inline-block; padding: 8px 16px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer;' href='excluirCliente.php?id_cliente={$cliente['id_cliente']}' onclick='return confirm(\"Tem certeza que deseja excluir este cliente?\")'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
        ?>
    </table>
    
    
    
</body>
</html>
