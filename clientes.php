<?php
include_once('config.php');

session_start();

if (!isset($_SESSION['usuarioLogado'])){
    header("Location: index.php");
}

$sql = "SELECT * FROM hospedes ORDER BY idhospedes DESC";

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
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <script type="text/javascript" src="main.js"></script>
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
                         <a class="container__button" href="CLIENTESCadastrar.php">Cadastrar Hóspede
                              <span class="material-symbols-outlined">
                                   person_add
                              </span>
                         </a>

                    </div>
               </div>
               <div class="container column">
                    <div class="container row">
                         <h2 class="map__title">Listagem de Hóspedes</h2>
                    </div>
               </div>
               <div class="container column">
                    <div class="container row">
                         <table class="table">
                              <thead class="label">
                                   <tr>
                                        <th scope="col" class="label__title">CPF</th>
                                        <th scope="col" class="label__title">Nome</th>
                                        <th scope="col" class="label__title">Email</th>
                                        <th scope="col" class="label__title">Telefone</th>
                                        <th scope="col" class="label__title"></th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   
                                   while ($user_data = $result->fetchArray(SQLITE3_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $user_data['cpf'] . "</td>";
                                        echo "<td>" . $user_data['nome'] . "</td>";
                                        echo "<td>" . $user_data['email'] . "</td>";
                                        echo "<td>" . $user_data['telefone'] . "</td>";
                                        echo "<td>
                                                  <a class='button-list' href='CLIENTESeditar.php?id=$user_data[idhospedes]'>
                                                       <span class='material-symbols-outlined'>
                                                            edit
                                                       </span>
                                                  </a>
                                                  <a class='button-list' href='CLIENTESexcluir.php?id=$user_data[idhospedes]'>
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