<?php
class ClienteDTO {
    private $idCliente;
    private $nome;
    private $cpf;
    private $email;

    public function __construct($idCliente = null) {
        $this->idCliente = $idCliente;
    }

    /**
     * Get the value of idCliente
     */
    public function getIdCliente() {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     */
    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    /**
     * Get the value of nome
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email) {
        $this->email = $email;
    }
}
?>
