<?php

    include_once('config.php');

    if (!empty($_POST['nome'])) {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidadeCamaCasal = $_POST['quantidadeCamaCasal'];
        $quantidadeCamaSolteiro = $_POST['quantidadeCamaSolteiro'];
        $valor = $_POST['valor'];
        $cafe = isset($_POST['cafe']) ? 1 : 0;
        $openBar = isset($_POST['openBar']) ? 1 : 0;
        $openFood = isset($_POST['openFood']) ? 1 : 0;
        $frigoBar = isset($_POST['frigoBar']) ? 1 : 0;
        $tvAhCabo = isset($_POST['tvAhCabo']) ? 1 : 0;

        $sqlUpdate = "UPDATE planos SET 
                        nome = '$nome', 
                        quantidadeCamaCasal = $quantidadeCamaCasal,
                        quantidadeCamaSolteiro = $quantidadeCamaSolteiro,
                        valor = '$valor',
                        cafe = $cafe,
                        openBar = $openBar,
                        openFood = $openFood,
                        frigoBar = $frigoBar,
                        tvAhCabo = $tvAhCabo
                        WHERE id = $id";

        if ($conexao->exec($sqlUpdate)) {
            header('Location: planos.php');
        } else {
            header('Location: planos.php');
        }
    }
?>