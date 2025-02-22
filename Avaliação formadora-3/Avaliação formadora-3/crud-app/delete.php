<?php
require 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
exit();
?>
