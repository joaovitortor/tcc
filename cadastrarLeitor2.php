<?php
//1. conectar no banco de dados (ip, usuario, senha, nome do banco)
require_once("conexao.php");

if (isset($_POST['cadastrar'])) {
    //2. Receber os dados para inserir no BD
    $status = $_POST['status'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $dn = $_POST['dn'];
    $dnFormatted = date('d/m/Y', strtotime($dn));
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //3. preparar sql para inserir
    $sql = "insert into leitor (status, nome, telefone, endereco, cpf, dn, email, senha)
values ('$status', '$nome', '$telefone', '$endereco','$cpf', '$dn', '$email', '$senha')";


    // Criar objetos DateTime para a data de nascimento e a data atual
    $dataNascimentoObj = new DateTime($dn);
    $dataAtualObj = new DateTime();

    // Calcular a diferença entre as datas
    $diferenca = $dataNascimentoObj->diff($dataAtualObj);

    // Obter a idade em anos
    $idade = $diferenca->y;

    //4. executar sql no bd
    mysqli_query($conexao, $sql);

    //5.mostrar uma mensagem ao usuário
    $mensagem = "Cadastro realizado com sucesso!";

    if ($idade < 18) {
        $idUsuario = mysqli_insert_id($conexao);
        header("Location: cadastrarResponsavel.php?idusuario=$idUsuario");
        exit;
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
                            <input class="geekcb-field required" id="dn" placeholder="Data de Nascimento" required
                                type="date" name="dn">
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field required" oninput="nameValidate()" placeholder="Nome" required type="texto" name="nome">
                            
                        </div>

                        <div class="form-column">
                            <input class="geekcb-field required" id="telefone" name="telefone" placeholder="Telefone"
                                required type="texto" name="telefone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field required" id="cpf" placeholder="Cpf" required type="texto"
                                name="cpf">
                        </div>
                        <div class="form-column">
                            <input class="geekcb-field required" placeholder="Endereço" required type="texto"
                                name="endereco">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column esquerda">
                            <input class="geekcb-field required" placeholder="E-mail" required type="email"
                                name="email">
                        </div>
                        <div class="form-column">
                            <input class="geekcb-field required" placeholder="Senha" required type="password"
                                name="senha">
                        </div>
                    </div>

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
    <script>
        const form = document.getElementById('leitorForm');
        const campos =document.querySelectorAll('.required');
        const span = document.querySelectorAll('.span-required');
        const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        function nameValidate(){
            if (campos[1].value.length < 3) {
                console.log('nome deve ter 3 caracteres');
            } else {
                console.log('ok');
            }
        }
    </script>
</body>

</html>