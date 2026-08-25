<?php

include '../infra/conexao.php';

$id_animal = isset($_GET['id_animal']) ? (int) $_GET['id_animal'] : 0;

$sql = "SELECT * FROM animais WHERE id_animal = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id_animal);
mysqli_stmt_execute($stmt);
$resultadoAnimal = mysqli_stmt_get_result($stmt);
$animal = mysqli_fetch_assoc($resultadoAnimal);

if (!$animal) {
    die('Animal não encontrado.');
}

$clientes = mysqli_query($conexao, "SELECT id_cliente, nome_cliente FROM clientes");

if (!$clientes) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_animal = trim($_POST['nome_animal']);
    $especie = trim($_POST['especie']);
    $raca = trim($_POST['raca']);
    $idade = (int) $_POST['idade'];
    $id_responsavel = (int) $_POST['id_responsavel'];

    $sql = "UPDATE animais SET nome_animal = ?, especie = ?, raca = ?, idade = ?, id_responsavel = ? WHERE id_animal = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'ssdsss', $nome_animal, $especie, $raca, $idade, $id_responsavel, $id_animal);

    if (mysqli_stmt_execute($stmt)) {
        echo "Animal atualizado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        exit();
    } else {
        echo "Erro ao atualizar animal: " . mysqli_error($conexao);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Editar Animal!</h1>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" name="nome_animal" id="nome_animal" value="<?php echo htmlspecialchars($animal['nome_animal']); ?>" required>
        <br>
        <label for="especie">Espécie:</label>
        <input type="text" name="especie" id="especie" value="<?php echo htmlspecialchars($animal['especie']); ?>" required>
        <br>
        <label for="raca">Raça:</label>
        <input type="text" name="raca" id="raca" value="<?php echo htmlspecialchars($animal['raca']); ?>" required>
        <br>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?php echo htmlspecialchars($animal['idade']); ?>" required>
        <br>
        <label for="id_responsavel">Responsável:</label>
        <select name="id_responsavel" id="id_responsavel" required>
            <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                <option 
                    value="<?php echo htmlspecialchars($cliente["id_cliente"]) ?>"
                    <?php if ($cliente["id_cliente"] === $animal["id_responsavel"]) echo "selected"; ?>
                >
                    <?php echo htmlspecialchars($cliente["nome_cliente"]) ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Atualizar Prato</button>
    </form>
    <button type="button" onclick="window.location.href='../index.php'">Voltar</button>

</body>

</html>