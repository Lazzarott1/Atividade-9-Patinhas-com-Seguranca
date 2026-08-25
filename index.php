<?php

include "infra/conexao.php";


$clientes = mysqli_query($conexao, "SELECT * FROM clientes");

if (!$clientes) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$animais = mysqli_query($conexao, "SELECT id_pet, nome_animal, especie, raca, idade, clientes.nome_cliente AS nome_responsavel FROM animais JOIN clientes ON animais.id_responsavel = clientes.id_cliente");

if (!$animais) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cadastro de Pratos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>Sistema AUmigos</h1>
    </header>
    <main>

        <h2>Cadastrar Cliente!</h2>
        <form action="public/cadastrar_cliente.php" method="POST">
            <label for="nome_cliente">Nome:</label>
            <input type="text" id="nome_cliente" name="nome_cliente" required>
            <button type="submit">Cadastrar</button>
        </form>

        <div>
            <h2>Clientes Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>

                <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cliente["id_cliente"]) ?></td>
                        <td><?php echo htmlspecialchars($cliente["nome_cliente"]) ?></td>
                        <td>
                            <a href="public/editar_cliente.php?id_cliente=<?php echo urlencode($cliente["id_cliente"]) ?>">Editar</a>
                            <a href="public/deletar_cliente.php?id_cliente=<?php echo urlencode($cliente["id_cliente"]) ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <h2>Cadastrar Animal!</h2>
        <form action="public/cadastrar_animal.php" method="POST">
            <label for="nome_animal">Nome:</label>
            <input type="text" id="nome_animal" name="nome_animal" required>
            <br>
            <label for="especie">Espécie:</label>
            <input type="text" id="especie" name="especie" required>
            <br>
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca" required>
            <br>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>
            <br>
            <label for="nome_cliente">Responsável:</label>
            <select name="nome_cliente" id="nome_cliente" required>
                <?php $clientes = mysqli_query($conexao, "SELECT * FROM clientes"); ?>
                <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                    <option value="<?php echo htmlspecialchars($cliente["id_cliente"]) ?>"><?php echo htmlspecialchars($cliente["nome_cliente"]) ?></option>
                <?php } ?>
            </select>
            <br>
            <button type="submit">Cadastrar</button>
        </form>

        <div>
            <h2>Animais Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Raça</th>
                    <th>Idade</th>
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>

                <?php while ($animal = mysqli_fetch_assoc($animais)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($animal["id_pet"]) ?></td>
                        <td><?php echo htmlspecialchars($animal["nome_animal"]) ?></td>
                        <td><?php echo htmlspecialchars($animal["especie"]) ?></td>
                        <td><?php echo htmlspecialchars($animal["raca"]) ?></td>
                        <td><?php echo htmlspecialchars($animal["idade"]) ?></td>
                        <td><?php echo htmlspecialchars($animal["nome_responsavel"]) ?></td>
                        <td>
                            <a href="public/editar_animal.php?id_pet=<?php echo urlencode($animal["id_pet"]) ?>">Editar</a>
                            <a href="public/deletar_animal.php?id_pet=<?php echo urlencode($animal["id_pet"]) ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>