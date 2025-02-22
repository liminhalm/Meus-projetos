<?php
// sessão
session_start();
// conexão com o banco de dados
include 'db_connect.php';

// ++++++++++++++++++++++++++++++++++ CRUD +++++++++++++++++++++++++++++++++++++

// inserir registro
if (isset(($_POST['btn-cadastrar']))) {


    // Insere novo registro
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO pessoas (nome, idade) VALUES ('$nome', $idade)";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('location: index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('location: index.php');
    }
}



// atualizar registro
if (isset(($_POST['btn-editar']))) {
    $nome = mysqli_escape_string($conn, $_POST['nome']);
    $idade = mysqli_escape_string($conn, $_POST['idade']);
    $id = mysqli_escape_string($conn, $_POST['id']);


    $sql = "UPDATE pessoas SET nome = '$nome', idade = '$idade' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Atulizado com sucesso!";
        header('location: index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('location: index.php');
    }
}


// deletar cadastro
if (isset(($_POST['btn-deletar']))) {
    $id = mysqli_escape_string($conn, $_POST['id']);


    $sql = "DELETE FROM pessoas WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('location: index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao Deletar!";
        header('location: index.php');
    }
}

