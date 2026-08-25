<?php

mysqli_report(MYSQLI_REPORT_OFF);

include "../infra/conexao.php";

$id_cliente = $_GET['id_cliente'];

$stmt = mysqli_prepare($conexao, "DELETE FROM clientes WHERE id_cliente = ?");
mysqli_stmt_bind_param($stmt, 'i', $id_cliente);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "Cliente excluído com sucesso.";
    echo "<br><a href='../index.php'>Voltar</a>";
} else {
    if (mysqli_errno($conexao) == 1451) {
        die("Não é possível excluir este cliente porque ele possui animais cadastrados.");
    } else {
        die("Erro ao excluir cliente: " . mysqli_error($conexao));
    }
}

?>