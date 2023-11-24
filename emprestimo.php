<?php
require_once("conexao.php");

if (isset($_POST['cadastrar'])) {
    $statusEmprestimo = $_POST['statusEmprestimo'];
    $dataPrevistaDevolucao = $_POST['dataPrevistaDevolucao'];
    $idLeitor = $_POST['leitor'];

    $sql = "INSERT INTO emprestimo (statusEmprestimo, dataPrevistaDevolucao, idLeitor) VALUES ('$statusEmprestimo', '$dataPrevistaDevolucao','$idLeitor')";
   
    mysqli_query($conexao, $sql);
    
    $idEmprestimo = mysqli_insert_id($conexao);

    if(isset($_POST['livro']) && is_array($_POST['livro'])) {
        foreach ($_POST['livro'] as $idLivro) {
            $sql2 = "INSERT INTO itensDeEmprestimo (idEmprestimo, idLivro, statusItem) VALUES ('$idEmprestimo','$idLivro', 'Emprestado')";
            mysqli_query($conexao, $sql2);
          
            $sql3 ="UPDATE livro SET statusLivro = 'Emprestado' WHERE id = $idLivro";
            mysqli_query($conexao, $sql3);
        }
    }
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
            <?php require_once('sidebar.php')  ?>
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


            </div>
            <div class="geekcb-wrapper">
                <form method="post" class="geekcb-form-contact" id="formularioEmprestimo">
                    <h1 class="titulo">Empréstimo</h1>
               

                    <select class="geekcb-field" name="statusEmprestimo" id="selectbox" data-selected="">
                        <option class="fonte-status" value="" selected="selected" disabled="disabled"
                            placeholder="Status">Status</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>

                    <label for="leitor" class="titulo" style="font-size:1.2rem; text-align: left">Selecione o leitor:
                    </label>
                    <select class="selectleitor" name="leitor" id="leitor">
                        <option class="fonte-status" disabled="disabled" placeholder="Selecione o leitor"></option>
                        <?php
                        $sql = "select * from leitor order by nome";
                        $resultado = mysqli_query($conexao, $sql);

                        while ($linha = mysqli_fetch_array($resultado)):
                            $idLeitor = $linha['id'];
                            $nome = $linha['nome'];

                            echo "<option value='{$idLeitor}'>{$nome}</option>";
                        endwhile;
                        ?>

                    </select>
                        <br><br>
                    <label for="livro" class="titulo" style="font-size:1.2rem; text-align: left">Selecione o(s) livros para empréstimo:
                    </label>
                    <select class="selectleitor" name="livro[]" id="livro" multiple>
                        <option class="fonte-status" disabled="disabled" placeholder="Selecione o livro"></option>
                        <?php
                        $sql = "select * from livro where statusLivro = 'Disponível' order by titulo";
                        $resultado = mysqli_query($conexao, $sql);

                        while ($linha = mysqli_fetch_array($resultado)):
                            $idLivro = $linha['id'];
                            $titulo = $linha['titulo'];
                            $isbn = $linha['isbn'];
                            $edicao = $linha['edicao'];


                            echo "<option value='{$idLivro}'>{$titulo} - Ed. {$edicao} - ISBN: {$isbn} </option>";
                        endwhile;

                        ?>

                    </select>
                    <br><br> <p class="titulo" style="text-align: left; font-size: 1.3rem">
                    <?php
                    $dataAtual = date("Y-m-d");
                    echo "Data do empréstimo: " . $dataFormatada = date("d/m/Y", strtotime($dataAtual));?></p>
                    <p class="titulo" style="text-align: left; font-size: 1.3rem">
                   <?php $dataPrevistaDevolucao = date('Y-m-d', strtotime("+7 days",strtotime($dataAtual))); 
                    echo  "Data prevista para devolução: " . $dataPrevistaDevolucaoFormatada =  date('d/m/Y', strtotime("+7 days",strtotime($dataAtual))); 
                    ?> 
                    </p>
                    <input type="hidden" name="dataPrevistaDevolucao" id="dataPrevistaDevolucaoInput" value="<?= $dataPrevistaDevolucao ?>">
                    <button class="geekcb-btn" type="submit" name="cadastrar" id="cadastrar">Realizar empréstimo</button>
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
            $('#leitor').select2();
        });
        $(document).ready(function () {
            $('#livro').select2();
        });
    </script>

<script>
  
</script>


</body>

</html>