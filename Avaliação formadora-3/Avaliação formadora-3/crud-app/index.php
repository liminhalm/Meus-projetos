<?php
require 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM users WHERE name LIKE :search OR email LIKE :search";
$stmt = $conn->prepare($sql);
$stmt->execute(['search' => '%' . $search . '%']);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>CRUD Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="container">
    <h1 class="my-4 text-center">Gerenciamento de Usuários</h1>
    <div class="d-flex mb-3">
        <form class="form-inline mr-auto" method="GET" action="index.php">
            <input type="text" name="search" placeholder="Buscar por Nome ou E-mail" class="form-control mr-2" value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <a href="create.php" class="btn btn-success">Adicionar Usuário</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
