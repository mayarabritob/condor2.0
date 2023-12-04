<?php

include_once('config.php');

session_start();

if (!isset($_SESSION['usuarioLogado'])){
     header("Location: index.php");
}

if (isset($_POST['idplano'])) {
    $idPlano = $_POST['idplano'];

    $sql = "SELECT * FROM planos WHERE id = $idPlano";
    $result = $conexao->query($sql);

    if ($result) {
        $plano = $result->fetchArray(SQLITE3_ASSOC);
        echo json_encode($plano);
    } else {
        echo json_encode(['erro' => 'Erro ao obter detalhes do plano.']);
    }
} else {
    echo json_encode(['erro' => 'ID do plano não fornecido.']);
}