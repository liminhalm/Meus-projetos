<?php
require 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name = ?, email = ?, phone = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $phone, $role, $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="container">
    <h2 class="my-4 text-center">Editar Usuário</h2>
    <form action="update.php?id=<?= $user['id'] ?>" method="POST">
        <div class="form-group">
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="role" value="<?= htmlspecialchars($user['role']) ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
