<?php

include '../infra/conexao.php';

$id_cliente = isset($_GET['id_cliente']) ? (int) $_GET['id_cliente'] : 0;

$sql = "SELECT * FROM clientes WHERE id_cliente = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id_cliente);
mysqli_stmt_execute($stmt);
$resultadoCliente = mysqli_stmt_get_result($stmt);
$cliente = mysqli_fetch_assoc($resultadoCliente);

if (!$cliente) {
    die('Cliente não encontrado.');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_cliente = trim($_POST['nome_cliente']);

    $sql = "UPDATE clientes SET nome_cliente = ? WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $nome_cliente, $id_cliente);

    if (mysqli_stmt_execute($stmt)) {
        echo "Cliente atualizado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        exit();
    } else {
        echo "Erro ao atualizar cliente: " . mysqli_error($conexao);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Editar Cliente!</h1>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" name="nome_cliente" id="nome_cliente" value="<?php echo htmlspecialchars($cliente['nome_cliente']); ?>" required>
        <br>
        <button type="submit">Atualizar Cliente</button>
    </form>
    <button type="button" onclick="window.location.href='../index.php'">Voltar</button>

</body>

</html>