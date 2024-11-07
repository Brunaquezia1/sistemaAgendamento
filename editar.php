<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Buscar o agendamento pelo ID
    $sql = "SELECT * FROM agendamentos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $agendamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$agendamento) {
        die("Agendamento não encontrado.");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];

        // Atualizar no banco de dados
        $sql = "UPDATE agendamentos SET nome = :nome, email = :email, data = :data, descricao = :descricao WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Agendamento atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar agendamento.";
        }
    }
} else {
    die("ID não fornecido.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
</head>
<body>
    <h2>Editar Agendamento</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $agendamento['nome']; ?>" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?php echo $agendamento['email']; ?>" required><br><br>

        <label for="data">Data e Hora:</label>
        <input type="datetime-local" name="data" id="data" value="<?php echo date('Y-m-d\TH:i', strtotime($agendamento['data'])); ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?php echo $agendamento['descricao']; ?></textarea><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
