<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from leitor where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}

//2. Prepara a SQL
$sql = "select * from leitor";

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

                <form method="post" class="geekcb-form-contact" onsubmit="return false;">
                    <div class="listar">
                        <h2 style="font-family: 'Fjalla One'; text-align: center">Listagem de leitores
                            <a href="cadastrarLeitor.php" class="botao">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </h2><br>

                        <table>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>CPF</td>
                                    <td>E-mail</td>
                                    <td>Telefone</td>
                                </tr>
                            <tbody>
                                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td>
                                            <?= $linha['id'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['nome'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['cpf'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['email'] ?>
                                        </td>
                                        <td>
                                            <?= $linha['telefone'] ?>
                                        </td>

                                        <td>

                                            <a style="margin-right: 8px;" href="produtoAlterar.php? id=<?= $linha['id'] ?>"
                                                class="botao">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button onclick="openModal()" style="margin-right: 8px;" value="id=<?=$informacao['resultado'] ?>"
                                                class="botao">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>

                                            <a href="listarLeitor.php? id=<?= $linha['id'] ?>" class="botao"
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

        <div class="modal-container">
            <div class="modal">
                <h2>Info</h2>
                <hr />
                <span>
                    Nome = <?=  ['nome'] ?>
                </span>
                <hr />
                <div class="btns">
                    <button class="btnOK" onclick="closeModal()">OK</button>
                    <button class="btnClose" onclick="closeModal()">Close</button>
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
        const modal = document.querySelector('.modal-container')

        function openModal() {
            modal.classList.add('active')
        }

        function closeModal() {
            modal.classList.remove('active')
        }
    </script>
</body>

</html>