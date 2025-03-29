<?php
require '../autenticacao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if ($autenticado->login($nome, $senha)) {
        header("Location: ../Cadastro/cadastrarProdutos.php");
        exit();
    } else {
        echo '<span style =" color: white;">Nome de usuário ou senha incorretos.</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
    <p class="texto2">Não tem uma conta? <a href="../Registro/registro.php">Registre-se aqui</a>.</p>
</body>

</html>