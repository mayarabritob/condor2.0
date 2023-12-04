<?php

    include_once('config.php');
    session_start();

    if(isset($_SESSION['usuarioLogado']))
    {
        unset($_SESSION['usuarioLogado']); 
        session_destroy();
        session_unset();
    }
    header('Location: index.php');
    
?>