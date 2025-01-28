<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $senha = md5 ($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $usuario = $result->fetch_assoc();

        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else{
        $error = "Email ou senha invalidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="body2">
    <main class="login">
        <div class="container" style="width: 400px">
           
            <form method="post" action="">
            <h2>Login</h2>
                <label for="email">Email:</label>
                <input type="text" name="email" require>
                <label for="senha" class="senha">Senha:</label>
                <input type="password" name="senha" require>
                <button type="submit" style="margin_bottom: 30px;">Entrar</button>
                <?php if (isset($error)) echo "<p class='message error'>$error</p>"; ?>
            </form>
        </div>
    </main>
</body>
</html>