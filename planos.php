<?php

    include_once('config.php');

    session_start();

    if (!isset($_SESSION['usuarioLogado'])){
        header("Location: index.php");
    }

    $sql = "SELECT * FROM planos ORDER BY id DESC";

    $result = $conexao->query($sql);

    
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    <a href="index.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="container register">
            <div class="container column button">
                <div class="container row">
                    <a href="PLANOScadastrar.php" class="container__button">Adicionar Plano
                        <span class="material-symbols-outlined">
                            add
                        </span>
                    </a>
                    
                </div>
            </div>
            <div class="container column">
                    <div class="container row">
                         <table class="table">
                              <thead class="label">
                                   <tr>
                                        <th scope="col" class="label__title">Nome Quarto</th>
                                        <th scope="col" class="label__title">Qtd Cama de Casal</th>
                                        <th scope="col" class="label__title">Qtd Cama de Solteiro</th>
                                        <th scope="col" class="label__title">Valor Quarto</th>
                                        <th scope="col" class="label__title">Café da Manhã</th>
                                        <th scope="col" class="label__title">Open Bar</th>
                                        <th scope="col" class="label__title">Open Food</th>
                                        <th scope="col" class="label__title">Frigobar</th>
                                        <th scope="col" class="label__title">TV a cabo</th>
                                        <th scope="col" class="label__title"></th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   while ($user_data = $result->fetchArray(SQLITE3_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td style='text-align: center;'>" . $user_data['nome']  . "</td>";
                                        echo "<td style='text-align: center;'>" . $user_data['quantidadeCamaCasal'] . "</td>";
                                        echo "<td style='text-align: center;'>" . $user_data['quantidadeCamaSolteiro'] . "</td>";
                                        echo "<td style='text-align: center;'>" . "R$ " . $user_data['valor'] . "</td>";
                                        echo "<td style='text-align: center;'>" . ($user_data['cafe'] ? 'Sim' : 'Não') . "</td>";
                                        echo "<td style='text-align: center;'>" . ($user_data['openBar'] ? 'Sim' : 'Não') . "</td>";
                                        echo "<td style='text-align: center;'>" . ($user_data['openFood'] ? 'Sim' : 'Não') . "</td>";
                                        echo "<td style='text-align: center;'>" . ($user_data['frigoBar'] ? 'Sim' : 'Não') . "</td>";
                                        echo "<td style='text-align: center;'>" . ($user_data['tvAhCabo'] ? 'Sim' : 'Não') . "</td>";
                                        echo "<td>
                                                  <a class='button-list' href='PLANOSeditar.php?id=$user_data[id]'>
                                                       <span class='material-symbols-outlined'>
                                                            edit
                                                       </span>
                                                  </a>
                                                  <a class='button-list' href='PLANOSexcluir.php?id=$user_data[id]'>
                                                       <span class='material-symbols-outlined'>
                                                            delete
                                                       </span>
                                                  </a>
                                             </td>";
                                   }
                                   ?>
                              </tbody>
                         </table>
                    </div>
               </div>
        </div>
    </main>
</body>

</html>