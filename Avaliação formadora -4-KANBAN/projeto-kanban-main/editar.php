 <?php include 'crud.php'; 

    if (isset($_GET['id'])) { 
        $id = mysqli_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM pessoas WHERE id = '$id'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_array($resultados);
    }
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
             <h3 class="light">Editar Cliente</h3>
             <form action="crud.php" method="post">
                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

                 <div class="input-field col s12">
                     <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
                     <label for="nome">Nome</label>
                 </div>

                 <div class="input-field col s12">
                     <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
                     <label for="idade">Idade</label>
                 </div>

                 <button type="submit" name="btn-editar" class="btn">Editar</button>
                 <a href="index.php" type="submit" class="btn green">Lista de adicionados</a>

             </form>
         </div>
     </div>


     <!-- Compiled and minified JavaScript /materialize/ -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 </body>

 </html>