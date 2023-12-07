<?php
//1. conectar no banco de dados (ip, usuario, senha, nome do banco)
require_once("conexao.php");

require_once("admAutenticacao.php");

if (isset($_POST['cadastrarAutor'])) {
    //2. Receber os dados para inserir no BD
    $status = $_POST['cadastrarAutorStatus'];
    $nome = $_POST['cadastrarAutorNome'];

    //3. preparar sql para inserir
    $sql = "INSERT INTO autor (status, nome) VALUES ('$status', '$nome')";

    //4. executar sql no bd
    mysqli_query($conexao, $sql);
}

if (isset($_POST['cadastrarEditora'])) {
    //2. Receber os dados para inserir no BD
    $status = $_POST['cadastrarEditoraStatus'];
    $nome = $_POST['cadastrarEditoraNome'];

    //3. preparar sql para inserir
    $sql = "INSERT INTO editora (status, nome) VALUES ('$status', '$nome')";

    //4. executar sql no bd
    mysqli_query($conexao, $sql);
}

if (isset($_POST['cadastrarGenero'])) {
    //2. Receber os dados para inserir no BD
    $status = $_POST['cadastrarGeneroStatus'];
    $nome = $_POST['cadastrarGeneroNome'];

    //3. preparar sql para inserir
    $sql = "INSERT INTO genero (status, nome) VALUES ('$status', '$nome')";

    //4. executar sql no bd
    mysqli_query($conexao, $sql);
}

if (isset($_POST['cadastrar'])) {
    //2. Receber os dados para inserir no BD
    $statusLivro = $_POST['statusLivro'];
    $titulo = $_POST['titulo'];
    $pag = $_POST['pag'];
    $isbn = $_POST['isbn'];
    $edicao = $_POST['edicao'];
    $idEditora = $_POST['editora'];
    $idGenero = $_POST['genero'];

    $diretorio = "uploads/";
    $arquivoDestino = $diretorio . $_FILES['arquivo']['name'];

    $nomeArquivo = "";
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoDestino)) {
        $nomeArquivo = $_FILES['arquivo']['name'];
    } else {
        echo "ERRO: Arquivo não enviado";
    }

    //3. preparar sql para inserir usando prepared statement
    $sql = "INSERT INTO livro (statusLivro, titulo, pag, isbn, edicao, idEditora, idGenero, arquivo) VALUES ('$statusLivro','$titulo','$pag','$isbn', '$edicao','$idEditora', '$idGenero','$nomeArquivo')";

    mysqli_query($conexao, $sql);

    $idLivro = mysqli_insert_id($conexao);
    $idAutores = $_POST['autor'];


    foreach ($idAutores as $idAutor) {
        $sql = "INSERT INTO livroautor (idLivro, idAutor) VALUES ('$idLivro','$idAutor')";
        mysqli_query($conexao, $sql);
    }
    $mensagem = "Cadastrado com sucesso";
}
?>

<!DOCTYPE html>
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
    <link rel="shortcut icon" href="logo.ico">

    <title>Cadastrar Livro</title>
</head>

<body>
    <nav>
        <a href="main.php" style="text-decoration: none">
            <div class="logo-name">
                <div class="logo-image">
                    <img src="logo.ico" alt="">
                </div>
                <span class="logo_name">Bibliotech</span>
            </div>
        </a>
        <div class="menu-items">
            <ul class="nav-links">
                <?php require_once('sidebar.php') ?>
            </ul>

            <ul class="logout-mode">
                <li><a href="sair.php">
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
                <i class="fa-solid fa-bars sidebar-toggle botaoNav"></i>
            </div>
        </div>
        <div class="corpo">
            <div class="geekcb-wrapper">
                <form method="post" class="geekcb-form-contact" enctype="multipart/form-data" id="insert_data">
                    <?php require_once("mensagem.php") ?>
                    <h1 class="titulo">Cadastrar Livro</h1>

                    <input class="geekcb-field" id="titulo" placeholder="Título do livro" required type="texto"
                        name="titulo">

                    <div class="form-row">
                        <div class="form-column; esquerda">
                            <select class="geekcb-field" name="statusLivro" id="selectbox" data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Status">Status
                                </option>
                                <option value="Disponível" selected="selected">Disponível</option>
                                <option value="Emprestado">Emprestado</option>
                            </select>
                        </div>
                        <div class="form-column">
                            <table>
                                <tr>
                                    <td>
                                        <label for="autor" style="font-family: Fjalla One">Autor(es): </label><br>
                                        <select class="geekcb-field" name="autor[]" id="autor" multiple>
                                            <option class="fonte-status" disabled="disabled"
                                                placeholder="Selecione os autores">
                                            </option>
                                            <?php
                                            $sql = "select * from autor order by nome";
                                            $resultado = mysqli_query($conexao, $sql);

                                            while ($linha = mysqli_fetch_array($resultado)):
                                                $idAutor = $linha['id'];
                                                $nome = $linha['nome'];

                                                echo "<option value='{$idAutor}'>{$nome}</option>";
                                            endwhile;
                                            ?>
                                        </select>
                                    </td>
                                   
                                    <td>
                                         <a class="geekcb-btn" data-bs-toggle="modal" data-bs-target="#modalAutor">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" placeholder="Quantidade de páginas" required type="texto"
                                name="pag">
                        </div>

                        <div class="form-column">
                        <table>
                                <tr>
                                    <td>
                                        <label for="editora" style="font-family: Fjalla One">Editora: </label><br>
                                        <select class="geekcb-field" name="editora" id="editora">
                                        <option class="fonte-status" disabled="disabled"
                                                placeholder="Selecione os autores">
                                            </option>
                                            <?php
                                            $sql = "select * from editora where status = 'Ativo' order by nome";
                                            $resultado = mysqli_query($conexao, $sql);

                                            while ($linha = mysqli_fetch_array($resultado)):
                                                $idEditora = $linha['id'];
                                                $nome = $linha['nome'];

                                                echo "<option value='{$idEditora}'>{$nome}</option>";
                                            endwhile;
                                            ?>
                                        </select>
                                    </td>
                                   
                                    <td>
                                         <a class="geekcb-btn" data-bs-toggle="modal" data-bs-target="#modalEditora">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" id="edicao" placeholder="Edição" required type="texto"
                                name="edicao">
                        </div>
                        <div class="form-column">
                        <table>
                                <tr>
                                    <td>
                                        <label for="genero" style="font-family: Fjalla One">Gênero </label><br>
                                        <select class="geekcb-field" name="genero" id="genero">
                                            <option class="fonte-status" disabled="disabled"
                                                placeholder="Selecione os autores">
                                            </option>
                                            <?php
                                            $sql = "select * from genero where status = 'Ativo' order by nome";
                                            $resultado = mysqli_query($conexao, $sql);

                                            while ($linha = mysqli_fetch_array($resultado)):
                                                $idAutor = $linha['id'];
                                                $nome = $linha['nome'];

                                                echo "<option value='{$idGenero}'>{$nome}</option>";
                                            endwhile;
                                            ?>
                                        </select>
                                    </td>
                                   
                                    <td>
                                         <a class="geekcb-btn" data-bs-toggle="modal" data-bs-target="#modalGenero">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" id="isbn" name="isbn" placeholder="ISBN" required type="texto">
                        </div>
                        <div class="form-column">
                            <input type="file" class="geekcb-field" name="arquivo" id="arquivo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda" style="width: 70%">
                            <a href="listarLivros.php" class="botaolistar"> <i class="fa-regular fa-file-lines"></i></a>
                        </div>
                        <div class="form-column">
                            <button class="geekcb-btn" type="submit" name="cadastrar">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once("procurarEmprestimo.php"); ?>
        <!-- MODALS CADASTRAR -->

        <!-- MODAL CADASTRAR AUTOR -->
        <div class="modal fade" id="modalAutor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">
                            Cadastrar Autor
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <select type="hidden" class="geekcb-field" name="cadastrarAutorStatus" id="selectbox"
                                data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Status">Status
                                </option>
                                <option value="Ativo" selected="selected">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                            <input class="geekcb-field" value="" placeholder="Nome" required type="texto"
                                name="cadastrarAutorNome">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button class="geekcb-btn" type="submit" name="cadastrarAutor">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL CADASTRAR GÊNERO -->
        <div class="modal fade" id="modalGenero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">
                            Cadastrar Gênero
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <select type="hidden" class="geekcb-field" name="cadastrarGeneroStatus" id="selectbox"
                                data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Status">Status
                                </option>
                                <option value="Ativo" selected="selected">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                            <input class="geekcb-field" value="" placeholder="Nome" required type="texto"
                                name="cadastrarGeneroNome">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button class="geekcb-btn" type="submit" name="cadastrarGenero">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL CADASTRAR EDITORA -->
        <div class="modal fade" id="modalEditora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">
                            Cadastrar Editora
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <select type="hidden" class="geekcb-field" name="cadastrarEditoraStatus" id="selectbox"
                                data-selected="">
                                <option class="fonte-status" value="" disabled="disabled" placeholder="Status">Status
                                </option>
                                <option value="Ativo" selected="selected">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                            <input class="geekcb-field" value="" placeholder="Nome" required type="texto"
                                name="cadastrarEditoraNome">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button class="geekcb-btn" type="submit" name="cadastrarEditora">Cadastrar</button>
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
    <script src="js/bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $('#autor').select2();
        });
        $(document).ready(function () {
            $('#editora').select2();
        });
        $(document).ready(function () {
            $('#genero').select2();
        });
    </script>
</body>

</html>