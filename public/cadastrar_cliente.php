<?php

include '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_cliente = $_POST['nome_cliente'] ?? '';

    $sql = "INSERT INTO clientes (nome_cliente) VALUES (?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmt, 's', $nome_cliente);

    if (mysqli_stmt_execute($stmt)) {
        echo "Cliente cadastrado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        mysqli_stmt_close($stmt);
        exit();
    } else {
        echo "Erro ao cadastrar cliente: " . mysqli_error($conexao);
    }

    mysqli_stmt_close($stmt);
}

?>