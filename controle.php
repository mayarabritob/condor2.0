<?php 

    include_once('config.php');

    session_start();

    if (!isset($_SESSION['usuarioLogado'])){
        header("Location: index.php");
    }

    $sql = "SELECT * FROM quartos";

    $result = $conexao->query($sql);

    $quartos = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $quartos[] = $row;
    }

?>

<!DOCTYPE php>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .ocupado {
            background-color: blue;
            color: white; 
        }    
    </style>
</head>

<body>
    <header class="navbar">
        <img src="./img/icon-48x48.png" class="navbar__icon">
        <h1 class="navbar__title">Condor Resort</h1>
    </header>
    <main class="principal">
        <div class="container menu-links">
            <ul class="menu-links__list">
                <li class="list__item "><span class="material-symbols-outlined">
                        supervisor_account
                    </span>
                    <a href="controle.php">Controle</a>
                </li>
                <li class="list__item">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <a href="clientes.php">Hóspedes</a>
                </li>
                <li class="list__item">
                    <span class="material-symbols-outlined">
                        drive_file_rename_outline
                    </span>
                    <a href="planos.php">Planos</a>
                </li>
                <li class="list__item">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="container register">
            <div class="container column button">
                <div class="container row">
                    <a class="container__button" href="CONTROLERegistrar.php">Registrar Entrada
                        <span class="material-symbols-outlined">
                            login
                        </span>
                    </a>

                </div>
            </div>
            <div class="container column">
                <div class="container row">
                    <h2 class="map__title">Controle de Sistema</h2>
                </div>
            </div>
            <div class="container row">
            <?php
                $counter = 0;
                foreach ($quartos as $quarto) {
                    $nome = $quarto['nome'];
                    $id = $quarto['id'];
                    $situacao = $quarto['situacao'] ? 'Disponível' : 'Ocupado' ;
                    $classeQuarto = $quarto['situacao'] ? '' : 'ocupado';
                ?>
                    <a href="#" class="container__item <?= $classeQuarto ?>">
                        <h2 class="apartament__title"><?= $nome ?></h2>
                    </a>

                    <?php
                    $counter++;
                    if ($counter % 4 == 0) {
                        echo '</div><div class="container row">';
                    }
                ?>
                <?php
                }
            ?>
            </div>
        </div>
    </main>
</body>

</php>