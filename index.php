<?php

    include_once('config.php');
  
    session_start();

    if (isset($_SESSION['usuarioLogado'])){
        header("Location: controle.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="./styles/base.css">
    <title>Condor Resort</title>
    <link rel="SHORTCUT ICON" href="./img/icon-48x48.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="page-login">
        <section class="login">
            <h1 class="login__title">Condor Resort</h1>
            <h2 class="login__text">Digite seu email e senha para continuar</h2>
            <div class="form">
                <form action=login.php method="POST" class="form__inputs">
                    <label for="user" class="inputs__title">Email</label>

                    <input type="email" id="user" name="Email" class="inputs__data" required>

                    <label for="password" class="inputs__title">Senha</label>

                    <input type="password" id="password" name="Senha" class="inputs__data" required>

                    <button type="submit" name="login" value="login" id="login" class="inputs__button">
                        Entrar</button>
                    <a class="inputs__reset" href="#">Esqueci a senha</a>
                </form>
            </div>
        </section>
    </main>
</body>

</html>