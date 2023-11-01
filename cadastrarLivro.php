<?php
//1. conectar no banco de dados (ip, usuario, senha, nome do banco)
require_once("conexao.php");

if (isset($_POST['cadastrar'])) {
    //2. Receber os dados para inserir no BD
    $status = $_POST['status'];
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $edicao = $_POST['edicao'];
    $pag = $_POST['pag'];
    $idEditora = $_POST['idEditora'];
    $idGenero = $_POST['idGenero'];

    //3. preparar sql para inserir
    $sql = "insert into livro (status, titulo, isbn, edicao, pag, idEditora, idGenero)
values ('$status', '$titulo', '$isbn', '$edicao', '$pag',' $idEditora', '$idGenero')";


    $idLivro = mysqli_insert_id($conexao);
    header("Location: livroAutor.php?idLivro=$idLivro");

    $tituloLivro = $titulo;
    header("Location: livroAutor.php?tituloLivro=$tituloLivro");


   
    //4. executar sql no bd
    mysqli_query($conexao, $sql);

    //5.mostrar uma mensagem ao usuário
    $mensagem = "Cadastro realizado com sucesso!";

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
                <form method="post" class="geekcb-form-contact" id="leitorForm">
                    <a href="listarLeitor.php" class="botaolistar"> <i class="fa-regular fa-file-lines"></i></i></a>
                    <h1 class="titulo">Cadastrar Livro</h1>
                    <div class="form-row">
                        <div class="form-column; esquerda">
                            <select class="geekcb-field" name="status" id="selectbox" data-selected="">
                                <option class="fonte-status" value="" selected="selected" disabled="disabled"
                                    placeholder="Status">Status</option>
                                <option value="Emprestado">Emprestado</option>
                                <option value="Disponível">Disponível</option>
                            </select>
                        </div>
                        <div class="form-column">
                            <input class="geekcb-field" id="titulo" placeholder="Título" required type="texto"
                                name="titulo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" placeholder="ISBN" required type="texto" name="isbn">
                        </div>

                        <div class="form-column">
                            <input class="geekcb-field" id="edicao" name="edicao" placeholder="Edição" required type="texto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" id="pag" placeholder="Número de páginas" required type="texto" name="pag">
                        </div>

                        <div class="form-row"> 

                        <select name="idGenero" id="idGenero" placeholder="Gênero" class="geekcb-field">
                            <option class="fonte-status" value="" selected="selected" disabled="disabled"
                                                            placeholder="Editora">Gênero</option>
                            <?php
                            $sql="select * from genero order by nome";
                            $resultado= mysqli_query($conexao, $sql);
                        
                            while($linha = mysqli_fetch_array($resultado)):
                              $id = $linha['id'];
                              $nome= $linha['nome'];
                        
                              echo "<option value='{$id}'>{$nome}</option>";
                            endwhile;
                            ?>
                            </select>  
                            
  </div>
  </div>

  <div class="form-row"> 
  <select name="idEditora" id="idEditora" placeholder="Editora" class="geekcb-field">
    <option class="fonte-status" value="" selected="selected" disabled="disabled"
                                    placeholder="Editora">Editora</option>
    <?php
    $sql="select * from editora order by nome";
    $resultado= mysqli_query($conexao, $sql);

    while($linha = mysqli_fetch_array($resultado)):
      $id = $linha['id'];
      $nome= $linha['nome'];

      echo "<option value='{$id}'>{$nome}</option>";
    endwhile;
    ?>
    </select>  
                            
                            
                    <button class="geekcb-btn" type="submit" name="cadastrar">Cadastrar</button>
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