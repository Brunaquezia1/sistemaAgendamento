<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['equipamento'];
    $ambiente = $_POST['ambiente'];
    $data = $_POST['dia/mes/ano'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO agendamentos (nome, email, data, horario VALUES (:equipamento, :ambiente, :dia/mes/ano, :horario)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':equipamento', $nome);
    $stmt->bindParam(':ambiente', $ambiente);
    $stmt->bindParam(':dia/mes/ano', $data);
    $stmt->bindParam(':horario', $horario);

    if ($stmt->execute()) {
        echo "Agendamento realizado com sucesso!";
    } else {
        echo "Erro ao realizar agendamento.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
</head>
<body>
    <h2>Agendar Consulta</h2>
    <form method="POST" action="agendar.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="data">Data e Hora:</label>
        <input type="datetime-local" name="data" id="data" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea><br><br>

        <button type="submit">Agendar</button>
    </form>
</body>
</html>
