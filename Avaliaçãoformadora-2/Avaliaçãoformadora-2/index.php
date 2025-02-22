<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Formadora 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <img src="./logofaixa.jpg" alt="logo faixa">
    </header>

<div class="container">
    <h1>CADASTRO</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST["nome"]);
        if (!empty($nome)) {
            echo "<div class='message'>Olá, <strong>" . $nome . "</strong>! Seja bem-vindo!</div>";
        } 
        
        else {
            echo "<div class='message'>Por favor, insira seu nome.</div>";
        }
    }
    ?>

    <form action="index.php" method="post">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <br>
        <input type="text" name="idade" placeholder="Digite sua idade">
        <br>
        <input type="text" name="email" placeholder="Digite seu email">
        <input type="submit" value="Enviar">
    </form>
</div>

</body>
</html>