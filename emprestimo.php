<?php
//1. conectar no banco de dados (ip, usuario, senha, nome do banco)
require_once("conexao.php");

if (isset($_POST['cadastrar'])) {
    $dataFormatada = $_POST['$dataEmprestimoFormatada'];

    $statusEmprestimo = $_POST['statusEmprestimo'];

}


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
    <script src="https://kit.fontawesome.com/e507e7a758.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastrar.css">
    <link rel="stylesheet" href="css/bootstrap.css">

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
                <form method="post" class="geekcb-form-contact">             
                
                <p class="titulo" style="font-size:1.3rem" id="dataAtual"></p>
                <script>
    // Obtém a data atual
    var dataAtual = new Date();

    // Obtém o dia, mês e ano
    var dia = dataAtual.getDate();
    var mes = dataAtual.getMonth() + 1; // Mês é indexado de 0 a 11, então adicionamos 1
    var ano = dataAtual.getFullYear();

    // Formata a data como dd/mm/aa
    var dataFormatada = (dia < 10 ? '0' : '') + dia + '/' + (mes < 10 ? '0' : '') + mes + '/' + ano % 100;

    // Exibe a data formatada na página HTML
    document.getElementById("dataAtual").innerHTML = "Data do empréstimo: " + dataFormatada;

</script>
<p class="titulo" style="font-size:1.3rem" id="dataDevolucao"></p>
<script>

    var dataDevolucao = new Date(dataAtual);
                        dataDevolucao.setDate(dataDevolucao.getDate() + 7);

                        // Obtém o dia, mês e ano da data de devolução
                        var diaDevolucao = dataDevolucao.getDate();
                        var mesDevolucao = dataDevolucao.getMonth() + 1; // Mês é indexado de 0 a 11, então adicionamos 1
                        var anoDevolucao = dataDevolucao.getFullYear();

                        // Formata a data de devolução como dd/mm/aa
                        var dataDevolucaoFormatada = (diaDevolucao < 10 ? '0' : '') + diaDevolucao + '/' + (mesDevolucao < 10 ? '0' : '') + mesDevolucao + '/' + anoDevolucao % 100;

                        // Exibe a data de devolução na página HTML
                        document.getElementById("dataDevolucao").innerHTML = "Data de devolução: " + dataDevolucaoFormatada;

</script>




               
                <select class="geekcb-field" name="statusEmprestimo" id="selectbox" data-selected="">
                        <option class="fonte-status" value="" selected="selected" disabled="disabled"
                            placeholder="Status">Status</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                  



                    <button class="geekcb-btn" type="submit" name="cadastrar">Realizar empréstimo</button>
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
    <script>
        $(document).ready(function () {
            $('#autor').select2();
        });

        
    </script>



</body>

</html>