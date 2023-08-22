<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e507e7a758.js" crossorigin="anonymous"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Administrador Bibliotech</title>
</head>

<body>
<?php require_once("sidebar.php"); ?>

<section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Drop Down Sidebar</span>
      <div class="search-box">
        <i class="uil uil-search"></i>
        <input type="text" placeholder="Search here...">
      </div>
    </div>
    <!--<img src="images/profile.jpg" alt="">-->

<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-thumbs-up"></i>
                <span class="text">Total Likes</span>
                <span class="number">50,120</span>
            </div>
            <div class="box box2">
                <i class="uil uil-comments"></i>
                <span class="text">Comments</span>
                <span class="number">20,120</span>
            </div>
            <div class="box box3">
                <i class="uil uil-share"></i>
                <span class="text">Total Share</span>
                <span class="number">10,120</span>
            </div>
        </div>
    </div>

    <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
        </div>

        <div class="recent-orders">
                <h2>Pedidos Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome do Produto</th>
                            <th>Número do Produto</th>
                            <th>Método de Pagamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Mostrar Tudo</a>
            </div>
    </div>
</div>
</div>
<?php require_once("rodape.php");