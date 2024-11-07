<?php
include 'conexao.php';

$sql = "SELECT * FROM agendamentos ORDER BY data DESC";
$stmt = $pdo->query($sql);
$agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Agendamentos</title>
</head>
<body>
    <h2>Lista de Agendamentos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data e Hora</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendamentos as $agendamento): ?>
                <tr>
                    <td><?php echo $agendamento['id']; ?></td>
                    <td><?php echo $agendamento['nome']; ?></td>
                    <td><?php echo $agendamento['email']; ?></td>
                    <td><?php echo $agendamento['data']; ?></td>
                    <td><?php echo $agendamento['descricao']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $agendamento['id']; ?>">Editar</a> | 
                        <a href="deletar.php?id=<?php echo $agendamento['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
