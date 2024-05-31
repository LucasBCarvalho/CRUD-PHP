<?php
require_once '../dao/ClienteDAO.php';

if (isset($_GET['id_cliente'])) {
    $idCliente = $_GET['id_cliente'];
    $clienteDAO = new ClienteDAO();
    $result = $clienteDAO->excluirCliente($idCliente);

    if ($result) {
        header("Location: listarClientes.php?message=Cliente excluído com sucesso");
    } else {
        header("Location: listarClientes.php?message=Erro ao excluir cliente");
    }
} else {
    header("Location: listarClientes.php?message=ID do cliente não fornecido");
}
exit();
?>
