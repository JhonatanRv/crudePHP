<?php
//Conexão
include_once 'php_action/db_connect.php';

//Sessão
session_start();

//verificação
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>

<html>
    <head>
        <title>Página restrita</title>
        <meta charset="utf-8">
        <link>
    </head>
    <body>
        <h1> Olá, seja bem-vindo <?php echo $dados['nome'];?></h1>
        <a href="php_action/logout.php">Sair</a>
</body>
</html>