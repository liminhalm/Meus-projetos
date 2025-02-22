<?php include 'crud.php';
if (isset($_SESSION['mensagem'])) { ?>

    <script>
        // mensagem
        window.onload = function() {
            M.toast({
                html: '<?php echo $_SESSION['mensagem']; ?>'
            })
        }
    </script>
<?php
}
session_unset();

// if(!empty($_POST['buscar'])){
//     echo 'contem algo';
// }


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS /materialize/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Gerenciar Pessoa</title>
</head>

<body>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h1 class="light">Tabela pessoas</h1>

            <!-- Formulário para buscar pessoa pelo nome -->
            <form action="index.php" method="post">
                <input type="search" name="nomeBusca" placeholder="pesquisar">
                <button type="submit" name="busca" class="btn material-icons">search</button>
            </form>

            <br>

            <form action="index.php" method="post">
                <table class="striped">

                    <thead>
                        <tr>
                            <th>Nome:</th>
                            <th>idade:</th>
                        </tr>


                    </thead>

                    <tbody>
                        <?php
                        // condição para o campo buscar
                        if (isset($_POST['busca'])) {
                            // variavel para buscar
                            $nomeBuscar = $_POST['nomeBusca'];
                            // prepara o sql para busca
                            $sqlBusca = "SELECT * from pessoas where nome like '%$nomeBuscar%' ";
                            $resultadoBusca = mysqli_query($conn, $sqlBusca);

                            if ($resultadoBusca->num_rows > 0) {
                                while ($dados = mysqli_fetch_assoc($resultadoBusca)) {;
                        ?>
                                    <tr>
                                        <td><?php echo $dados['nome'] ?></td>
                                        <td><?php echo $dados['idade'] ?></td>
                                        <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                                        <td><a href="#modal<?php echo $dados['id'] ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                                        <!-- Modal Structure -->
                                        <div id="modal<?php echo $dados['id'] ?>" class="modal">
                                            <div class="modal-content">
                                                <h4>ATENÇÃO</h4>
                                                <p>deseja deletar esse registro?</p>
                                            </div>
                                            <div class="modal-footer">


                                                <form action="crud.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">
                                                    <button type="submit" name="btn-deletar" class="btn red">Deletar</button>
                                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                </form>

                                            </div>
                                        </div>

                                    </tr>
                            <?php }
                            }
                        }

                        // condição para mostrar lista de cadastros
                        if(empty($_POST['nomeBusca'])){
                        $sql = "SELECT * from pessoas";
                        $resultados = mysqli_query($conn, $sql);
                        while ($dados = mysqli_fetch_assoc($resultados)) {;
                            ?>

                            <tr>
                                <td><?php echo $dados['nome'] ?></td>
                                <td><?php echo $dados['idade'] ?></td>
                                <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                                <td><a href="#modal<?php echo $dados['id'] ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                                <!-- Modal Structure -->
                                <div id="modal<?php echo $dados['id'] ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>ATENÇÃO</h4>
                                        <p>deseja deletar esse registro?</p>
                                    </div>
                                    <div class="modal-footer">


                                        <form action="crud.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">
                                            <button type="submit" name="btn-deletar" class="btn red">Deletar</button>
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                        </form>

                                    </div>
                                </div>

                            </tr>
                        <?php }} ?>


                    </tbody>
                </table>
                <br>
                <a href="adicionar.php" class="btn">Adicionar</a>
        </div>
    </div>


    <!-- Compiled and minified JavaScript /materialize/ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        M.AutoInit();
    </script>

</body>

</html>