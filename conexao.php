<?php
$host = 'localhost'; 
$dbname = 'sistema_agendamento';
$username = 'Brunaquezia1'; 
$password = 'Bruna2914968'; 
try {
    $pdo = new PDO("mysql:host=$localhost;dbname=$sistema_agendamento", $Brunaquezia1, $Bruna2914968);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
