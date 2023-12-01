<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

require_once("admAutenticacao.php");

// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from administrador where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}

//2. Prepara a SQL
$sql = "select * from administrador";

//3. Executa a SQL
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
                <?php require_once('sidebar.php') ?>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="sair.php">
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
                <i class="fa-solid fa-bars sidebar-toggle botaoNav"></i>
            </div>
            <div class="geekcb-wrapper">
                <form method="post" class="container">
                    <?php
                    $status = isset($_POST['status']) ? $_POST['status'] : "";
                    $login = isset($_POST['login']) ? $_POST['login'] : "";
                    ?>

                </form>

                <form method="post" class="geekcb-form-contact">
                    <div class="listar">
                        <h2 style="font-family: 'Fjalla One'; text-align: center">Listagem de administradores</h2><br>
                        <table>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Status</td>
                                    <td>Nome</td>
                                </tr>
                            <tbody>
                                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td>
                                            <?= $linha['id'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['status'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['login'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['senha'] ?>
                                        </td>

                                        <td>

                                            <a href="produtoAlterar.php? id=<?= $linha['id'] ?>" class="botao">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <a href="listarAdministrador.php? id=<?= $linha['id'] ?>" class="botao"
                                                onclick="return confirm('Deseja mesmo excluir o cadastro?')">
                                                <i class="fa-sharp fa-solid fa-trash"></i> </a>

                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

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