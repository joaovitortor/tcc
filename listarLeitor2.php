<?php
//1. conectar no banco de dados (ip, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");


//EXCLUSÃO//
if(isset($_GET['id'])){ //verifica se o botão excluir foi clicado
  $sql= "delete from leitor where id = " . $_GET['id'];
  mysqli_query($conexao,$sql);
  $mensagem= "Exclusão realizada com sucesso.";
}
////

//geração de sql para relatório
$V_WHERE ="";
if (isset($_POST['pesquisar'])) { //se clicou no botao pesquisar
  $V_WHERE= " and nome like '%" . $_POST['nome']."%' ";
}

//2. Preparar a sql
$sql = "select * from leitor
where 1 = 1" . $V_WHERE;



//3. Executar a SQL
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
                <li><a href="cadastrarLeitor.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Leitor</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Livro</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Exemplar</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Autor</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Gênero</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Editora</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Responsável</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-share"></i>
                        <span class="link-name">Administrador</span>
                    </a></li>
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

        <div class="corpo">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle"></i>

                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Search here...">
                </div>

                <!--<img src="images/profile.jpg" alt="">-->
            </div>
            <div class="geekcb-wrapper">
                <form method="post" class="container">
                    <?php
                    $status = isset($_POST['status']) ? $_POST['status'] : "";
                    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
                    ?>
                </form>
            </div>
            <!--pesquisar usuarios-->
    <div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title">Pesquisar</h2>
    <form method = "post">
    <label name="nome" for="exampleFormControlInput1" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control">
        <p style="padding: 1px"></p>
        <button name="pesquisar" stype="button" class="btn btn-primary">Pesquisar</button>
    </div>
    </form>
  </div>
        </div>
        </div>
    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#telefone').inputmask('(99) 99999-9999');
        });
        $(document).ready(function () {
            $('#dn').inputmask('99/99/9999');
        });
        $(document).ready(function () {
            $('#cpf').inputmask('999.999.999-99');
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>