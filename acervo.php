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

        <div class="wrapperAcervo">
            <div class="containerAcervo">
                <div class="topAcervo"></div>
                <div class="bottomAcervo">
                    <div class="leftAcervo">
                        <div class="detailsAcervo">
                            <h1>Chair</h1>
                            <p>£250</p>
                        </div>
                        <div class="buyAcervo"><i class="material-icons">add_shopping_cart</i></div>
                    </div>
                    <div class="rightAcervo">
                        <div class="doneAcervo"><i class="material-icons">done</i></div>
                        <div class="detailsAcervo">
                            <h1>Chair</h1>
                            <p>Added to your cart</p>
                        </div>
                        <div class="removeAcervo"><i class="material-icons">clear</i></div>
                    </div>
                </div>
            </div>
            <div class="insideAcervo">
                <div class="icon">+</div>
                <div class="contentsAcervo">
                    <table>
                        <tr>
                            <th>Width</th>
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
        




        <script>
            $('.buyAcervo').click(function () {
                $('.bottomAcervo').addClass("clicked");
            });

            $('.removeAcervo').click(function () {
                $('.bottomAcervo').removeClass("clicked");
            });
        </script>

        <?php require_once("rodape.php");