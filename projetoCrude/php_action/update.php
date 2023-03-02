<?php
// Sessão
session_start();
// Conexão 
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $login = mysqli_escape_string($connect, $_POST['login']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    
if($_POST['senha'] != ''):
        $senha = md5($_POST['senha']);
        $senha = ", senha = 'senha'";
else:
    $senha = '';
endif;

$id = mysqli_escape_string($connect, $_POST['id']);

$sql = "UPDATE usuario SET nome = '$nome', login = '$login', email = '$email' $senha WHERE id = '$id'";

$login2 = "SELECT COUNT(*) FROM usuario WHERE login = '$login'"; // Nessa atribuição, ocorre uma verificação e, caso exista, uma contagem 
$email2 = "SELECT COUNT(*) FROM usuario WHERE login = '$email'"; // para saber se existem dados repetidos ou não.

if ($logins2 && $email2 !== 0) {
    if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Atualizado com sucesso!";
    header('Location: ../listar.php');
    else:
    $_SESSION['mensagem'] = "Ocorreu um erro!";
    header('Location: ../listar.php');
    endif;
    
} else if ($logins == 0)  {
    $_SESSION['mensagem'] = "O Login usado já existe!";
    header('Location: ../listar.php');
} else if ($email2 == 0) {
    $_SESSION['mensagem'] = "O Email usado já existe!";
    header('Location: ../listar.php');
}

endif;