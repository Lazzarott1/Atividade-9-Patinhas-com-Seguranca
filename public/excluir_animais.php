<?php
include '../infra/conexao.php';

$id_animal = $_GET['id_animal'];

$stmt = mysqli_prepare($conexao, "DELETE FROM animais WHERE id_animal = ?");
mysqli_stmt_bind_param($stmt, 'i', $id_animal);

if (mysqli_stmt_execute($stmt)) {
    echo "Animal excluído com sucesso.";
    echo "<br><a href='../index.php'>Voltar</a>";
} else {
    echo "Erro ao excluir animal: " . mysqli_error($conexao);
}

mysqli_stmt_close($stmt);