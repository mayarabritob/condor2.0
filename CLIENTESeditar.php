<?php

include_once('config.php');

session_start();

if (!isset($_SESSION['usuarioLogado'])){
    header("Location: index.php");
}

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM hospedes where idhospedes = $id";

    $result = $conexao->query($sqlSelect);

    while ($user_data = $result->fetchArray(SQLITE3_ASSOC)) {
        $cpf = $user_data['cpf'];
        $nome = $user_data['nome'];
        $email = $user_data['email'];
        $telefone = $user_data['telefone'];
    }
}

function formatarCpf($cpf) {
    return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4', $cpf);
}

function formatarTelefone($telefone) {
    return preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '$1 $2-$3', $telefone);
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
    <script src="https://unpkg.com/imask"></script>
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
                    <h2 class="map__title">Editar Hóspede</h2>
                </div>
            </div>
            <form action="CLIENTESupdate.php" method="POST">
                <fieldset class="container" style="display: block;">
                    <div class="container row">
                        <div class="container__dados">
                            <label for="cpf" class="inputs__title">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="inputs__data" value="<?php echo formatarCpf($cpf) ?>" required>

                        </div>
                    </div>
                    <div class="container row">
                        <div class="container__dados">
                            <label for="nome" class="inputs__title">Nome Completo</label>
                            <input type="text" name="nome" id="nome" class="inputs__data" value="<?php echo $nome ?>" required>

                        </div>
                    </div>
                    <div class="container row">
                        <div class="container__dados">
                            <label for="email" class="inputs__title">Email</label>
                            <input type="text" name="email" id="email" class="inputs__data" value="<?php echo $email ?>" required>

                        </div>
                    </div>
                    <div class="container row">
                        <div class="container__dados">
                            <label for="telefone" class="inputs__title">Telefone</label>
                            <input type="tel" name="telefone" id="telefone" class="inputs__data" value="<?php echo formatarTelefone($telefone) ?>" required>
                        </div>
                    </div>
                    <div class="container row">
                        <div class="container__dados">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="container row">
                        <button type="submit" name="update" id="submit" class="container__button salvar">Salvar
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
        document.addEventListener('DOMContentLoaded', function () {
            var telefoneInput = document.getElementById('telefone');

            var telefoneMask = IMask(telefoneInput, {
                mask: '(00) 00000-0000'
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            var cpfInput = document.getElementById('cpf');

            var cpfMask = IMask(cpfInput, {
                mask: '000.000.000-00'
            });
        });
    </script>

</body>