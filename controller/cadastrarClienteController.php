<?php
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';


$nome = $_GET['nome'];
$cpf = $_GET['cpf'];
$email = $_GET['email'];

$clienteDTO = new ClienteDTO();
$clienteDTO->setNome($nome);
$clienteDTO->setCpf($cpf);
$clienteDTO->setEmail($email);

$clienteDAO = new ClienteDAO();
$ok = $clienteDAO->cadastrarCliente($clienteDTO);

if($ok){
    header('Location: ../index.php');
} else{
    header('Location: ../view/formCadastrarCliente.php');
}


?>