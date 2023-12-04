<?php

include_once('config.php');

session_start();

if (!isset($_SESSION['usuarioLogado'])){
     header("Location: index.php");
}

if (isset($_POST['submit'])) {
     include_once('config.php');

     $nome = $_POST['nome'];
     $quantidadeCamaCasal = $_POST['quantidadeCamaCasal'];
     $quantidadeCamaSolteiro = $_POST['quantidadeCamaSolteiro'];
     $valor = $_POST['valor'];
     if(isset($_POST['cafe'])){ $cafe = 1;}else{ $cafe = 0;};
     if(isset($_POST['openBar'])){ $openBar = 1;}else{ $openBar = 0;};
     if(isset($_POST['openFood'])){ $openFood = 1;}else{ $openFood = 0;};
     if(isset($_POST['frigoBar'])){ $frigoBar = 1;}else{ $frigoBar = 0;};
     if(isset($_POST['tvAhCabo'])){ $tvAhCabo = 1;}else{ $tvAhCabo = 0;};
     
     $result = $conexao->exec("INSERT INTO planos(nome,quantidadeCamaCasal,quantidadeCamaSolteiro,valor,cafe,openBar,openFood,frigoBar,tvAhCabo ) VALUES ('$nome','$quantidadeCamaCasal','$quantidadeCamaSolteiro','$valor','$cafe','$openBar','$openFood','$frigoBar','$tvAhCabo')");
     
     if ($result) {
          header('Location: planos.php');

     } else {
          header('Location: planos.php');
     }
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
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
     <script type="text/javascript" src="main.js"></script>
</head>

<body page="list">
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
                         <a class="container__button" href="clientes.php">Voltar
                              <span class="material-symbols-outlined">
                                   arrow_back
                              </span>
                         </a>

                    </div>
               </div>
               <div class="container column">
                    <div class="container row">
                         <h2 class="map__title">Cadastrar Plano</h2>
                    </div>
               </div>
               <form action="PLANOScadastrar.php" method="POST" class="form">
                    <fieldset class="container" style="display: block;">
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="nome" class="inputs__title">Nome do Quarto</label>
                                   <input type="text" name="nome" id="nome" class="inputs__data" required>

                              </div>
                         </div>
                         <br>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="email" class="inputs__title">Quantidade de Camas</label>
                                   <div class="container row">
                                        <div class="conteudo">
                                             <div class="icone-input">
                                                  <span class="material-symbols-outlined" style="font-size: 30px;">
                                                       bedroom_parent
                                                  </span>
                                                  <input type="number" name="quantidadeCamaCasal" id="quantidadeCamaCasal" class="campo-input" placeholder="Qtd Casal" required>
                                             </div>

                                             <div class="icone-input">
                                                  <span class="material-symbols-outlined" style="font-size: 30px;">
                                                       bedroom_child
                                                  </span>
                                                  <input type="number" name="quantidadeCamaSolteiro" id="quantidadeCamaSolteiro" class="campo-input"  placeholder="Qtd Solteiro" required>
                                             </div>
                                        </div>
                                   </div>
                                   
                              </div>
                         </div>
                         <br>

                         <div class="container row">
                              <div class="container__dados">
                                   <label for="valor" class="inputs__title">Valor do Quarto</label>
                                   <input type="text" name="valor" id="valor" class="inputs__data" required>
                              </div>
                         </div>
                         <br>

                         <div class="container row">
                              <div class="grupo-checkbox">
                                   <input type="checkbox" id="cafe" name="cafe">
                                   <label for="cafe">Café da Manhã</label>

                                   <input type="checkbox" id="openBar" name="openBar">
                                   <label for="openBar">Open Bar</label>

                                   <input type="checkbox" id="openFood" name="openFood">
                                   <label for="openFood">Open Food</label>

                                   <input type="checkbox" id="frigoBar" name="frigoBar">
                                   <label for="frigoBar">Frigobar</label>

                                   <input type="checkbox" id="tvAhCabo" name="tvAhCabo">
                                   <label for="tvAhCabo">TV a cabo</label>
                              </div>
                         </div>
                         <div class="container row">
                              <button type="submit" name="submit" id="submit" class="container__button salvar">Salvar
                                   <span class="material-symbols-outlined">
                                        check
                                   </span>
                              </button>
                         </div>
                    </fieldset>
               </form>

          </div>
     </main>
     <script>
          $(document).ready(function() {
               $('#valor').mask('000.000.000.000.000,00', { reverse: true });
          
               $('.form').submit(function(event) {
                    var quantidadeCamaSolteiro = parseInt($('#quantidadeCamaSolteiro').val());
                    var quantidadeCamaCasal = parseInt($('#quantidadeCamaCasal').val());

                    if (quantidadeCamaSolteiro + quantidadeCamaCasal > 4) {
                         alert('A soma das quantidades de camas solteiro e casal não pode ser maior que 4.');
                         event.preventDefault();
                    }
               });
          });
     </script>
</body>