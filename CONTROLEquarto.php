<?php

include_once('config.php');

session_start();

if (!isset($_SESSION['usuarioLogado'])){
     header("Location: index.php");
}

if (!empty($_GET['id'])) {

     $id = $_GET['id'];
     $sqlSelect = "SELECT * FROM quartos where id = $id";

     $result = $conexao->query($sqlSelect);

     // while ($user_data = $result->fetchArray(SQLITE3_ASSOC)) {
     //      $nome = $user_data['nome'];
     //      $valor = $user_data['valor'];
     //      $cafe = $user_data['openBar'];
     //      $openBar = $user_data['openBar'];
     //      $openFood = $user_data['openFood'];
     //      $frigoBar = $user_data['frigoBar'];
     //      $tvAhCabo = $user_data['tvAhCabo'];
     // }
}

$sqlhospedes = "SELECT idhospedes, nome FROM hospedes ORDER BY idhospedes DESC";
$resulthospedes = $conexao->query($sqlhospedes);
$optionshospedes = $resulthospedes->fetchArray(SQLITE3_ASSOC);

$sqlquartos = "SELECT id, nome FROM quartos WHERE situacao = 1 ORDER BY id DESC";
$resultquartos = $conexao->query($sqlquartos);
$optionsquartos = $resultquartos->fetchArray(SQLITE3_ASSOC);

$sqlplanos = "SELECT id, nome FROM planos ORDER BY id DESC";
$resultplanos = $conexao->query($sqlplanos);
$optionsplanos = $resultplanos->fetchArray(SQLITE3_ASSOC);

if (isset($_POST['submit'])) {

     $idhospede = $_POST['idhospede'];
     $quarto = $_POST['quarto'];
     $idplano = $_POST['idplano'];
     $valor = $_POST['valortotal'];
     $formapagamento = $_POST['formapagamento'];
     if(isset($_POST['cafe'])){ $cafe = 1;}else{ $cafe = 0;};
     if(isset($_POST['openBar'])){ $openBar = 1;}else{ $openBar = 0;};
     if(isset($_POST['openFood'])){ $openFood = 1;}else{ $openFood = 0;};
     if(isset($_POST['frigoBar'])){ $frigoBar = 1;}else{ $frigoBar = 0;};
     if(isset($_POST['tvAhCabo'])){ $tvAhCabo = 1;}else{ $tvAhCabo = 0;};
     
     $result = $conexao->exec("INSERT INTO hospedagem(
          idhospede,quarto,idplano,valor,cafe,openBar,openFood,frigoBar,tvAhCabo,formapagamento) 
          VALUES ('$idhospede','$quarto','$idplano','$valor','$cafe','$openBar','$openFood','$frigoBar','$tvAhCabo','$formapagamento')");
          
     $sqlUpdateSituacaoQuarto = "UPDATE quartos SET situacao = 0
     WHERE id='$quarto'";
  
     $result = $conexao->exec($sqlUpdateSituacaoQuarto);

     if ($result) {
          header('Location: controle.php');

     } else {
          header('Location: controle.php');
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
     
     <style>
        .container {
            display: flex;
        }

        .coluna {
            flex: 1;
            box-sizing: border-box;
            padding: 10px;
        }
    </style>
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
               
          <div class="container">
               <div class="coluna">
               <fieldset class="container" style="display: block;">
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="cpf" class="inputs__title">CPF</label>
                                   <input type="text" name="cpf" id="cpf" class="inputs__data" required>

                              </div>
                         </div>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="nome" class="inputs__title">Nome Completo</label>
                                   <input type="text" name="nome" id="nome" class="inputs__data" required>

                              </div>
                         </div>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="email" class="inputs__title">Email</label>
                                   <input type="text" name="email" id="email" class="inputs__data" required>

                              </div>
                         </div>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="telefone" class="inputs__title">Telefone</label>
                                   <input type="tel" name="telefone" id="telefone" class="inputs__data" required>
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
               </div>

               <div class="coluna">
               <fieldset class="container" style="display: block;">
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="cpf" class="inputs__title">CPF</label>
                                   <input type="text" name="cpf" id="cpf" class="inputs__data" required>

                              </div>
                         </div>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="nome" class="inputs__title">Nome Completo</label>
                                   <input type="text" name="nome" id="nome" class="inputs__data" required>

                              </div>
                         </div>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="email" class="inputs__title">Email</label>
                                   <input type="text" name="email" id="email" class="inputs__data" required>

                              </div>
                         </div>
                         <div class="container row">
                              <div class="container__dados">
                                   <label for="telefone" class="inputs__title">Telefone</label>
                                   <input type="tel" name="telefone" id="telefone" class="inputs__data" required>
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
               </div>

               <div class="coluna">
                    <label for="serviços" class="inputs__title">Serviços</label>
                    <br>
                    <div class="grupo-checkbox">
                         <div>
                              <input type="checkbox" id="cafe" name="cafe" data-valor="40">
                              <label for="cafe">Café da Manhã</label>
                         </div>

                         <div>
                              <input type="checkbox" id="openBar" name="openBar" data-valor="200">
                              <label for="openBar">Open Bar</label>
                         </div>

                         <div>
                              <input type="checkbox" id="openFood" name="openFood" data-valor="200">
                              <label for="openFood">Open Food</label>
                         </div>

                         <div>
                              <input type="checkbox" id="frigoBar" name="frigoBar" disabled>
                              <label for="frigoBar">Frigobar</label>
                         </div>

                         <div>
                              <input type="checkbox" id="tvAhCabo" name="tvAhCabo" disabled>
                              <label for="tvAhCabo">TV a cabo</label>
                         </div>
                    </div>
               </div>
          </div>
     </main>
     <script>
          $(document).ready(function() {

               $('#idplano').change(function() {
               var planoId = $(this).val();

                    if (planoId !== "default" && planoId !== "") {
                         $.ajax({
                              type: "POST",
                              url: "CONTROLEobterdetalhesplano.php",
                              data: { idplano: planoId },
                              dataType: "json",
                              success: function(response) {

                                   if (response.cafe == 1) {
                                        $('#cafe').prop('disabled', true);
                                        $('#cafe').data('valor', 0);
                                   }
                                   if (response.openBar == 1) {
                                        $('#openBar').prop('disabled', true);
                                        $('#openBar').data('valor', 0);
                                   }
                                   if (response.openFood == 1) {
                                        $('#openFood').prop('disabled', true);
                                        $('#openFood').data('valor', 0);
                                   }
                                   if (response.frigoBar == 1) {
                                        $('#frigoBar').prop('disabled', true);
                                        $('#frigoBar').data('valor', 0);
                                   }
                                   if (response.tvAhCabo == 1) {
                                        $('#tvAhCabo').prop('disabled', true);
                                        $('#tvAhCabo').data('valor', 0);
                                   }

                                   $('#cafe').prop('checked', response.cafe);
                                   $('#openBar').prop('checked', response.openBar);
                                   $('#openFood').prop('checked', response.openFood);
                                   $('#frigoBar').prop('checked', response.frigoBar);
                                   $('#tvAhCabo').prop('checked', response.tvAhCabo);

                                  

                                   $('#valor').val(response.valor );
                                   $('#valorbase').val(response.valor);
                              },
                              error: function() {
                              console.log('Erro ao obter detalhes do plano.');
                              }
                         });
                    } else {
                         $('.grupo-checkbox input[type="checkbox"]').prop('checked', false);
                         $('#valor').val("");
                         $('#valorbase').val("");
                    }
               });

               $('#cafe, #openBar, #openFood').change(function() {
                    calcularValorTotal();
               });

               function calcularValorTotal() {
                    var valorBase = parseFloat($('#valorbase').val().replace(',', '.')) || 0;
                    var valorCafe = $('#cafe').is(':checked') ? parseFloat($('#cafe').data('valor')) : 0;
                    var valorOpenBar = $('#openBar').is(':checked') ? parseFloat($('#openBar').data('valor')) : 0;
                    var valorOpenFood = $('#openFood').is(':checked') ? parseFloat($('#openFood').data('valor')) : 0;

                    var valorTotal = valorBase + valorCafe + valorOpenBar + valorOpenFood;
                    
                    var valorFormatado = 'R$ ' + valorTotal.toFixed(2).replace('.', ',');

                    $('#valor').val(valorFormatado);
                    $('#valortotal').val(valorTotal.toFixed(2).replace('.', ','));
               }
               $("form").submit(function() {
                    $("input").removeAttr("disabled");
               });
          });

          
     </script>

</body>