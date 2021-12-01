<?php
require_once 'connect.php';
$sql = "SELECT * FROM addcarts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $_GET['id']);
$stmt->execute();
$data = $stmt->fetchAll();
echo json_encode($data);