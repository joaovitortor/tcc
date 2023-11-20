<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <!--muda a fonte-->
    <script src="https://kit.fontawesome.com/e507e7a758.js" crossorigin="anonymous"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastrar.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Administrador Bibliotech</title>
</head>

<body>

    <div style="align-items: right" class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="fa-solid fa-user"></i>|
        </div>
    </div>
    <br><br><br>
    <h1 class="titulo text">Bibliotech<a href="cadastrarLeitor.php" class="botao">
            <i class="fa-solid fa-plus"></i>
        </a></h1>
    <div class="container">
        <h2 class="mt-3">
            <?php
            session_start();
            $nome = $_SESSION['nome'];
            ?>
            Seja bem vindo,
            <?= $nome ?>
        </h2>
    </div>

    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>