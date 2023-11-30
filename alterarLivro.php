<?php
//1. Conectar no BD (IP, usuario, senha, nome do bd)
require_once("conexao.php");

session_start();

if (!(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "adm")) {

    session_destroy();

    header("location: index.php");

    exit();
}

if (isset($_POST["logout"])) {
    session_destroy();

    header("location: index.php");

    exit();
}

if (isset($_POST['salvar'])) {
    //2. Receber os dados para inserir no BD
    $id = $_POST['id'];
    $idEditora = $_POST['idEditora'];
    $idGenero = $_POST['idGenero'];
    $statusLivro = $_POST['statusLivro'];
    $titulo = $_POST['titulo'];
    $pag = $_POST['pag'];
    $isbn = $_POST['isbn'];
    $edicao = $_POST['edicao'];

    $diretorio = "uploads/";
    $arquivoDestino = $diretorio . $_FILES['arquivo']['name'];

    $nomeArquivo = "";
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoDestino)) {
        $nomeArquivo = $_FILES['arquivo']['name'];
    } else {
        echo "ERRO: Arquivo não enviado";
    }

    //3. Preparar a SQL
    $sql = "update livro
    set 
    idEditora = '$idEditora',
    idGenero = '$idGenero',
    statusLivro = '$statusLivro',
    titulo = '$titulo',
    pag = '$pag',
    isbn = '$isbn',
    arquivo = '$nomeArquivo',
    edicao = '$edicao'
    where id = $id";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Inserido com sucesso &#128515;";
}

//Busca usuário selecionado pelo "usuarioListar.php"
$sql = "select * from livro where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado)
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
                <li>
                    <form method="post">
                        <button type="submit" name="logout"> <span class="link-name"> <i class="uil uil-signout"></i>Logout</span></button>
                    </form>
                </li>

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
                <i class="fa-solid fa-bars sidebar-toggle botaoNav"></i>
            </div>
        </div>
        <div class="corpo">
            <div class="geekcb-wrapper">

                <form method="post" class="container">
                    <?php
                    $statusLivro = isset($_POST['statusLivro']) ? $_POST['statusLivro'] : "";
                    $idGenero = isset($_POST['idGenero']) ? $_POST['idGenero'] : "";
                    $idEditora = isset($_POST['idEditora']) ? $_POST['idEditora'] : "";
                    $nome = isset($_POST['titulo']) ? $_POST['titulo'] : "";
                    $pag = isset($_POST['pag']) ? $_POST['pag'] : "";
                    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : "";
                    $edicao = isset($_POST['edicao']) ? $_POST['edicao'] : "";
                    $arquivo = isset($_POST['arquivo']) ? $_POST['arquivo'] : "";
                    ?>
                </form>

                <form method="post" class="geekcb-form-contact" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                    <a href="listarLivros.php" class="botaolistar"> <i class="fa-regular fa-file-lines"></i></i></a>
                    <h1 class="titulo">Alterar Livro</h1>
                    <div class="form-row">
                        <div class="form-column; esquerda">
                            <select class="geekcb-field" name="statusLivro" id="selectbox" data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Status">Status
                                </option>
                                <option value="Disponível" <?= ($linha['statusLivro'] == 'Disponível') ? 'selected="selected"' : '' ?>>Disponível</option>
                                <option value="Emprestado" <?= ($linha['statusLivro'] == 'Emprestado') ? 'selected="selected"' : '' ?>>Emprestado</option>
                            </select>

                        </div>
                        <div class="form-column">
                            <input class="geekcb-field" id="titulo" value="<?= $linha['titulo'] ?>"
                                placeholder="Título do livro" required type="texto" name="titulo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" placeholder="Quantidade de páginas" value="<?= $linha['pag'] ?>"
                                required type="texto" name="pag">
                        </div>

                        <div class="form-column">
                            <input class="geekcb-field" value="<?= $linha['isbn'] ?>" id="isbn" name="isbn"
                                placeholder="ISBN" required type="texto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" id="edicao" value="<?= $linha['edicao'] ?>" placeholder="Edição"
                                required type="texto" name="edicao">
                        </div>
                        <div class="form-column">
                            <select class="geekcb-field" name="idGenero" id="selectbox" data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Gênero">
                                    Gênero</option>
                                <?php
                                $sql = "select * from genero order by nome";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($linhaGenero = mysqli_fetch_array($resultado)):
                                    $idGenero = $linhaGenero['id'];
                                    $nomeGenero = $linhaGenero['nome'];
                                    $selectedGenero = ($idGenero == $linha['idGenero']) ? 'selected="selected"' : '';

                                    echo "<option value='{$idGenero}' {$selectedGenero}>{$nomeGenero}</option>";
                                endwhile;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <select class="geekcb-field" name="idGenero" id="selectbox" data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Gênero">
                                    Gênero</option>
                                <?php
                                $sql = "select * from editora order by nome";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($linhaGenero = mysqli_fetch_array($resultado)):
                                    $idEditora = $linhaEditora['id'];
                                    $nomeEditora = $linhaEditora['nome'];
                                    $selectedEditora = ($idEditora == $linha['idEditora']) ? 'selected="selected"' : '';

                                    echo "<option value='{$idEditora}' {$selectedEditora}>{$nomeEditora}</option>";
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-column">
                            <input type="file" class="geekcb-field" value="<?= $linha['arquivo'] ?>" name="arquivo"
                                id="arquivo">
                        </div>


                    </div>

                    <button class="geekcb-btn" type="submit" name="salvar">Cadastrar</button>
                </form>
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