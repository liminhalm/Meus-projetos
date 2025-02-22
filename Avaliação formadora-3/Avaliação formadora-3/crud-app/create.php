<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, phone, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $phone, $role]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Criar Usuário</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="container">
    <h2 class="my-4 text-center">Adicionar Usuário</h2>
    <form action="create.php" method="POST">
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="E-mail" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Telefone" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="role" placeholder="Cargo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
