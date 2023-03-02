<?php
//Header
include_once 'includes/header.php';
//verificação
session_start();
if(!isset($_SESSION['logado'])):
   // header('Location: index.php');
endif;
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo Login </h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="login" id="login">
                <label for="login">Login</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha">
                <label for="senha">Senha</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
            <a href="listar.php" class="btn green"> Lista de logins </a>
        </form>    
    </div>
</div>

<?php

//Footer
include_once 'includes/footer.php';
?>


    </div>
</div>