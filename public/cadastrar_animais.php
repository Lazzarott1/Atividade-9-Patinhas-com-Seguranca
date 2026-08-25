<?php

include "../infra/conexao.php";

$nome_animal = $_POST["nome_animal"];
$especie = $_POST["especie"];
$raca = $_POST["raca"];
$idade = $_POST["idade"];
$id_responsavel = $_POST["id_cliente"];

$sql = "INSERT INTO animais (nome_animal, especie, raca, idade, id_responsavel) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt === false) {
    die("Erro ao preparar a inserção do animal: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, 'sssii', $nome_animal, $especie, $raca, $idade, $id_responsavel);

if (mysqli_stmt_execute($stmt)) {
    echo "Animal cadastrado com sucesso!";
    echo "<br><a href='../index.php'>Voltar</a>";
    mysqli_stmt_close($stmt);
    exit();
} else {
    echo "Erro ao cadastrar animal: " . mysqli_error($conexao);
}

header("Location: ../index.php");

?>