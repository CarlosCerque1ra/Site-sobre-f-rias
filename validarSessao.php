<?php
//inicia a sessão para verificar se o usuario está autenticado

session_start();

//Verifica se a variavel de sessão 'Usuario'não esta definida
if(!isset($_SESSION['usuario'])){
    //Se o usuario não estiver logado, redireciona para a pagina Login
    header('Location: login.php');

    //garante que o resto do codigo não seja executado após o redirecionamento
    exit();
}

?>