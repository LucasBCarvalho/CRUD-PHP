<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/cadastroClientes.css">
    <title>Cadastro de cliente</title>
</head>
<body>
    <form action="../controller/cadastrarClienteController.php" method="get" onsubmit="alert('Cadastrado com sucesso!')">
        <div>
            <label for="">Nome</label>
            <input type="text" name="nome" id="">
        </div>

        <div>
            <label for="">CPF</label>
            <input type="text" name="cpf" id="">
        </div>

        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>

        <div>
            <input type="submit" value="cadastrar">
        </div>


    </form>
</body>
</html>