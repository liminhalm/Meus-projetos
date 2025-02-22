<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello2 PHP</title>
</head>
<body>
    <h1>Insira seu nome e Idade</h1>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" required><br><br>

        <input type="submit" value="Enviar">
    </form>


</body>
</html>
<?php 
    if  ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $name = ($_POST["nome"]);
        $age = ($_POST["idade"]);

        echo "<h2>Seu nome é: $name</h2>";
        echo "<h2>Sua idade é: $age anos</h2>";
    }

?>

<?php 
    phpinfo();
?>