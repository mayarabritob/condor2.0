<?php

    include_once('config.php');

    if(isset($_POST['login']))
    {
        $email = $_POST['Email'];
        $password = $_POST['Senha'];

        $sqlSelect = "SELECT * FROM usuarios where email = '$email' AND password = '$password'";

        $result = $conexao->query($sqlSelect);

        if($result->fetchArray(SQLITE3_ASSOC)){
            session_start();
            $_SESSION['usuarioLogado'] = $email;

            header('Location: clientes.php');
        }else{
            header('Location: index.php');
        }
        
    }else{
        echo "Erro";
        header('Location: index.php');
    }
    
?>