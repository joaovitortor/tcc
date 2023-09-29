<?php
//1. Conectar no BD (IP, usuario, senha, nome do bd)
require_once("conexao.php");
if (isset($_POST['salvar'])) {
    //2. Receber os dados para inserir no BD
    $id = $_POST['id'];
    $status = $_POST['status'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dn = $_POST['dn'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $nomeResp = $_POST['nomeResp'];
    $cpfResp = $_POST['cpfResp'];
    $telResp = $_POST['telResp'];

    //3. Preparar a SQL
    $sql = "update leitor
    set 
    status = '$status',
    nome = '$nome',
    telefone = '$telefone',
    endereco = '$endereco',
    dn = '$dn',
    cpf = '$cpf',
    email = '$email',
    nomeResp = '$nomeResp',
    cpfResp = '$cpfResp',
    telResp = '$telResp'
    where id = $id";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Inserido com sucesso &#128515;";
}

//Busca usuário selecionado pelo "usuarioListar.php"
$sql = "select * from leitor where id = " . $_GET['id'];
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
                    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";
                    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "";
                    $dn = isset($_POST['dn']) ? $_POST['dn'] : "";
                    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $nomeResp = isset($_POST['nomeResp']) ? $_POST['nomeResp'] : "";
                    $cpfResp = isset($_POST['cpfResp']) ? $_POST['cpfResp'] : "";
                    $telResp = isset($_POST['telResp']) ? $_POST['telResp'] : "";
                    ?>
                </form>

                <form method="post" class="geekcb-form-contact" id="leitorForm">
                    <a href="listarLeitor.php" class="botaolistar"> <i class="fa-regular fa-file-lines"></i></i></a>
                    <h1 class="titulo">Cadastrar Leitor</h1>
                    <div class="form-row">
                        <div class="form-column; esquerda">
                            <select class="geekcb-field" name="status" id="selectbox" data-selected="">
                                <option class="fonte-status" value="" selected="selected" disabled="disabled"
                                    placeholder="Status">Status</option>
                                <option value="1">Ativo</option>
                                <option value="2">Inativo</option>
                            </select>
                        </div>
                        <div class="form-column">
                            <input class="geekcb-field" id="dn" value="<?= $linha['dn']?>" placeholder="Data de Nascimento" required type="date"
                                name="dn">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" value="<?= $linha['nome']?>" placeholder="Nome" required type="texto" name="nome">
                        </div>

                        <div class="form-column">
                            <input class="geekcb-field" value="<?= $linha['telefone']?>" id="telefone" name="telefone" placeholder="Telefone" required
                                type="texto" name="telefone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" value="<?= $linha['cpf']?>" id="cpf" placeholder="Cpf" required type="texto" name="cpf">
                        </div>
                        <div class="form-column">
                            <input class="geekcb-field" value="<?= $linha['endereco']?>" placeholder="Endereço" required type="texto" name="endereco">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field" value="<?= $linha['email']?>" placeholder="E-mail" required type="email" name="email">
                        </div>
                        <div class="form-column">
                            <input class="geekcb-field"  value="<?= $linha['status']?>" placeholder="Senha" required type="password" name="senha">
                        </div>
                    </div>

                    <button class="geekcb-btn" type="submit" name="salvar">Salvar</button>
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