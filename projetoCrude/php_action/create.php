<?php

//Sessão
session_start();

//Conexão
require_once 'db_connect.php';

//Clear
function clear($input) {
    global $connect; //Essa forma de atribuir variábvel, o global, tem uma maior abrangência, pode ser acessada em qualquer lugar ( a grosso modo );
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var; 
}

if(isset($_POST['btn-cadastrar'])):
    $nome = clear($_POST['nome']);
    $login = clear($_POST['login']);
    $email = clear($_POST['email']);
    $senha = clear($_POST['senha']);
    $senha = md5($senha);

    $sql = "INSERT INTO usuario (nome, login, email, senha) VALUES ('$nome','$login','$email','$senha')";

    if (strlen($senha) < 8):
        header('Location: ../adicionar.php');
        exit(0);    
    endif;

    $loginU = "SELECT COUNT(*) FROM usuario WHERE login = '$login'";
    $emailU = "SELECT COUNT(*) FROM usuario WHERE email = '$email'";

    if(($loginU !== 0) || ($emailU !== 0) || ($loginU !== 0) && ($emailU !== 0) ){
    header('Location: ../adicionar.php');
          
    }
    
    //-------- Impedir o cadastro de dados vazios!
    if ( (empty($_POST['nome'])) || (empty($_POST['email'])) || (empty($_POST['login'])) || ((empty($_POST['senha'])))) {

        if ((empty($_POST['nome']))):
          $_SESSION['mensagem'] = "O Campo 'nome' é Obrigatório!";
        endif;

        if ((empty($_POST['login']))):
          $_SESSION['mensagem'] = "O Campo 'login' é Obrigatório!";
        endif;

            
        if ((empty($_POST['email']))):
          $_SESSION['mensagem'] = "O Campo 'email' é Obrigatório!";  
        endif;

        header('Location: ../adicionar.php');
        exit(0);


         }

         
    
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../listar.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../listar.php');
    endif;


endif;

?>

