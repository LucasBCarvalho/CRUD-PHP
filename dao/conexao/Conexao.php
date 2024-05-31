<?php


//Padrao Sigleton - Um unico ponto de acesso
abstract class Conexao
{
    public static function conexao()
    {
        // Informações de configuração do banco de dados
        $host = 'localhost'; // endereço do servidor MySQL
        $dbname = 'lucascrud'; // nome do banco de dados
        $username = 'root'; // nome de usuário do banco de dados
        $password = ''; // senha do banco de dados

        try {
            // Cria a instância PDO com as informações de conexão
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            // Define o modo de erro do PDO para exceções
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Conexão com o banco de dados realizada com sucesso!";
            return $pdo;
        } catch (PDOException $e) {
            // Captura e exibe o erro, se houver falha na conexão
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
    }
}