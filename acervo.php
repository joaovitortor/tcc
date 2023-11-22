<?php
require_once("conexao.php");


$sql = "SELECT livro.id, editora.nome as nomeEditora, genero.nome as nomeGenero, livro.statusLivro, livro.titulo, livro.pag, livro.isbn, livro.edicao, livro.arquivo as arquivo
        FROM livro
        LEFT JOIN editora ON livro.idEditora = editora.id
        LEFT JOIN genero ON livro.idGenero = genero.id";


//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);
?>


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
    <link rel="stylesheet" href="css/acervo.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Administrador Bibliotech</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Bibliotech</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <?php require_once('sidebar.php') ?>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">

        <div class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <i class="uil uil-bars sidebar-toggle"></i>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <h1 class="titulo">Acervo</h1>
        <?php while ($linha = mysqli_fetch_array($resultado)) { ?>


            <div class="wrapperAcervo">

                <div class="containerAcervo">
                    <div style="background-image: url('uploads/<?= $linha['arquivo'] ?>')" class="topAcervo"></div>
                    <div class="bottomAcervo">
                        <div class="leftAcervo">
                            <div class="detailsAcervo">
                                <h5 style="width: 50%; margin-top: 5%; text-align:center">
                                    <?= $linha['titulo'] ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="insideAcervo">
                    <div class="icon">+</div>
                    <div class="contentsAcervo">
                        <table>
                            <tr>
                                <?= $linha['id'] ?>
                                <th>Height</th>
                            </tr>
                            <tr>
                                <td>3000mm</td>
                                <td>4000mm</td>
                            </tr>
                            <tr>
                                <th>Something</th>
                                <th>Something</th>
                            </tr>
                            <tr>
                                <td>200mm</td>
                                <td>200mm</td>
                            </tr>
                            <tr>
                                <th>Something</th>
                                <th>Something</th>
                            </tr>
                            <tr>
                                <td>200mm</td>
                                <td>200mm</td>
                            </tr>
                            <tr>
                                <th>Something</th>
                                <th>Something</th>
                            </tr>
                            <tr>
                                <td>200mm</td>
                                <td>200mm</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


        <?php } ?>




        <script>
            $('.buyAcervo').click(function () {
                $('.bottomAcervo').addClass("clicked");
            });

            $('.removeAcervo').click(function () {
                $('.bottomAcervo').removeClass("clicked");
            });
        </script>

        <?php require_once("rodape.php");