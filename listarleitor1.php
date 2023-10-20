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
            <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Dropend
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                </ul>
            </div>
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

                <form method="post" class="geekcb-form-contact1" onsubmit="return false;">
                    <div>
                        <h2 style="font-family: 'Fjalla One'; text-align: center">Listagem de leitores
                            <a href="cadastrarLeitor.php" class="botao">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </h2><br>

                        <div class="caixaPai">
                            <div class="caixa1">ID</div>
                            <div class="caixa2">Nome</div>
                            <div class="caixa3">E-mail</div>
                            <div class="caixa4">Telefone</div>
                            <div class="caixa5">CPF</div>
                            <div class="caixa6"></div>
                        </div>

                        <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                            <div class="caixaPai">

                                <div class="caixa1">
                                    <?= $linha['id'] ?>
                                </div>

                                <div class="caixa2">
                                    <?= $linha['nome'] ?>
                                </div>

                                <div class="caixa3">
                                    <?= $linha['email'] ?>
                                </div>

                                <div class="caixa4">
                                    <?= $linha['telefone'] ?>
                                </div>

                                <div class="caixa5">
                                    <?= $linha['cpf'] ?>
                                </div>
                                <div class="caixa6"></div>

                                <a style="margin-right: 8px;" href="alterarLeitor.php? id=<?= $linha['id'] ?>"
                                    class="botao">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <button onclick="openModal(<?= $linha['id'] ?>)" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="margin-right: 8px;" name="info" class="botao">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <a href="listarLeitor.php? id=<?= $linha['id'] ?>" class="botao"
                                    onclick="return confirm('Deseja mesmo excluir o cadastro?')">
                                    <i class="fa-sharp fa-solid fa-trash"></i> </a>

                            </div>
                        </div>
                    <?php } ?>



            </div>
            </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">Informações do Usuário</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span><b>Nome: </b><span id="modalNome"></span></span> <br>
                        <span><b>Telefone: </b><span id="modalTelefone"></span></span> <br>
                        <span><b>Email: </b><span id="modalEmail"></span></span><br>
                        <span><b>Endereco: </b><span id="modalEndereco"></span></span><br>
                        <span><b>Data de Nascimento: </b><span id="modalDn"></span></span><br>
                        <span><b>CPF: </b><span id="modalCpf"></span></span><br>
                        <span id="modalNomeResp"></span>
                        <span id="modalCpfResp"></span>
                        <span id="modalTelResp"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
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
        const modalContent = document.querySelector('.modal-content'); // Seletor para o conteúdo do modal
        const modal = document.querySelector('.modal.fade'); // Seletor para o modal completo

        function openModal(userId) {
            const modal = document.querySelector('.modal.fade'); // Seletor para o modal completo

            // Faça uma solicitação AJAX para buscar os dados do usuário com base no userId
            $.ajax({
                type: 'GET',
                url: 'buscar_dados_usuario.php',
                data: { id: userId },
                dataType: 'json',
                success: function (data) {
                    // Preencha os campos do modal com os dados do usuário
                    document.getElementById('modalNome').textContent = data.nome;
                    document.getElementById('modalTelefone').textContent = data.telefone;
                    document.getElementById('modalEmail').textContent = data.email;
                    document.getElementById('modalEndereco').textContent = data.endereco;
                    document.getElementById('modalDn').textContent = data.dn;
                    document.getElementById('modalCpf').textContent = data.cpf;
                    document.getElementById('modalNomeResp').textContent = data.nomeResp;
                    document.getElementById('modalCpfResp').textContent = data.cpfResp;
                    document.getElementById('modalTelResp').textContent = data.telResp;

                    // Formate a data no formato "dd/mm/yyyy"
                    const dataNascimento = new Date(data.dn);
                    const dia = (dataNascimento.getDate() + 1).toString().padStart(2, '0');
                    const mes = (dataNascimento.getMonth() + 1).toString().padStart(2, '0');
                    const ano = dataNascimento.getFullYear();
                    const dataFormatada = `${dia}/${mes}/${ano}`;

                    const NomeResp = data.nomeResp;

                    // Verifica se o campo nomeResp não está vazio
                    if (data.nomeResp !== null) {
                        const SpanNomeResp = "<span><b>Nome do Responsável: </b>" + data.nomeResp + "</span> <br>";
                        const SpanCpfResp = "<span><b>Cpf do Responsável: </b>" + data.cpfResp + "</span> <br>";
                        const SpanTelResp = "<span><b>Telefone do Responsável: </b>" + data.telResp + "</span> <br>";
                        modalNomeResp.innerHTML = SpanNomeResp;
                        modalCpfResp.innerHTML = SpanCpfResp;
                        modalTelResp.innerHTML = SpanTelResp;
                    } else {
                        modalNomeResp.innerHTML = ""; // Limpa o conteúdo se nomeResp estiver vazio
                        modalCpfResp.innerHTML = "";
                        modalTelResp.innerHTML = "";
                    }


                    modalDn.textContent = dataFormatada;


                    modal.style.display = 'block'; // Defina o estilo de exibição como 'block' para mostrar o modal
                },
                error: function () {
                    alert('Falha ao buscar os dados do usuário.');
                }
            });
        }


        function closeModal() {
            const modal = document.querySelector('.modal-container');
            modal.classList.remove('active');
            modal.style.display = 'none';
        }
    </script>
</body>

</html>