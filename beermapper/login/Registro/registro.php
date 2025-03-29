<?php
require '../autenticacao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $apelido = $_POST['apelido'];

    if ($autenticado->registrar($nome, $senha, $apelido)) {
        $mensagem = '<span style =" color: white;">Usuário cadastrado com sucesso! Redirecionando para login...</span>';
        header("refresh:3;url=../Login/login.php"); // Aguarda 3 segundos antes de redirecionar
    } else {
        $mensagem = "Erro ao cadastrar usuário. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h1>Registro de Usuário</h1>
    
    <?php if (isset($mensagem)) : ?>
        <p style="color: <?= strpos($mensagem, 'sucesso') !== false ? 'green' : 'red' ?>;">
            <?= $mensagem ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="apelido">Apelido:</label>
        <input type="text" id="apelido" name="apelido" required><br><br>

        <button type="submit">Registrar</button>
    </form>
    
    <p>Já tem uma conta? <a href="../Login/login.php">Faça login aqui</a>.</p>
</body>

</html>
