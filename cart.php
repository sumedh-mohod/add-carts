<?php
require_once 'connect.php';
$post = file_get_contents("php://input");
$request = json_decode($post, true);
$sql = "INSERT into addcarts (id, name, quantity, price) values (?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $request['id']);
$stmt->bindValue(2, $request['name']);
$stmt->bindValue(3, $request['quantity']);
$stmt->bindValue(4, $request['price']);
$stmt->execute();
echo json_encode("Data inserted coming from PHP");
?>

