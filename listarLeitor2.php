<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
if (isset($_POST['excluir'])) {
    if (isset($_POST['check'])) { // Verifica se o botão excluir foi clicado
        $idUsuario = $_POST['idUsuario'];
        $sql = "delete from leitor where id = " . $idUsuario;
        mysqli_query($conexao, $sql);
        $mensagem = "Exclusão realizada com sucesso.";
    }
}


$V_WHERE = "";
if (isset($_POST['pesquisar'])) { //se clicou no botao pesquisar
    $V_WHERE = " and nome like '%" . $_POST['nome'] . "%' ";
}

//2. Preparar a sql
$sql = "select * from leitor
where 1 = 1" . $V_WHERE;

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

        <div class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <i class="uil uil-bars sidebar-toggle"></i>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <br><br><br>
        <h1 class="titulo">Listagem de Leitores <a href="cadastrarLeitor.php" class="botao">
                <i class="fa-solid fa-plus"></i>
            </a></h1>

        <br><br>


        <center>
            <form method="post">
                <label name="nome" for="exampleFormControlInput1" class="titulo">Pesquisar</label>
                <div class="input-button-container">
                    <input name="nome" type="text" class="formcampo">
                    <button name="pesquisar" stype="button" class="botaopesquisar">Pesquisar</button>
                </div>
                <br><br>
            </form>
        </center>


        <center>
            <div class="card cardlistar">
                <div class="card-body cardlistar2">
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col"><b>ID</b></td>
                                <td scope="col"><b>Status</b></td>
                                <td scope="col"><b>Nome</b></td>
                                <td scope="col"><b>Telefone</b></td>
                                <td scope="col"><b>E-mail</b></td>
                                <td scope="col"><b>Ações</b></td>
                            </tr>
                        </thead>
        </center>
        <tbody>
            <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title fs-5" id="exampleModalLabel">Informações do Usuário
                                </h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <span style="text-align: left"><b>Nome: </b>
                                    <?php echo $linha['nome']; ?>
                                </span><br>
                                <span><b>Telefone: </b>
                                    <?php echo $linha['telefone']; ?>
                                </span> <br>
                                <span><b>Email: </b>
                                    <?php echo $linha['email']; ?>
                                </span><br>
                                <span><b>Data de Nascimento: </b><span id="modalDn"></span></span><br>
                                <span><b>Endereco: </b>
                                    <?php echo $linha['endereco']; ?>
                                </span><br>
                                <span><b>Data de Nascimento: </b>
                                    <?php echo $linha['dn']; ?>
                                </span><br>
                                <span><b>CPF: </b>
                                    <?php echo $linha['cpf']; ?>
                                </span><br>
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
                <center>
                    <tr>
                        <td>
                            <?= $linha['id'] ?>
                        </td>
                        <td>
                            <?= $linha['status'] ?>
                        </td>
                        <td>
                            <?= $linha['nome'] ?>
                        </td>
                        <td>
                            <?= $linha['telefone'] ?>
                        </td>
                        <td>
                            <?= $linha['email'] ?>
                        </td>
                        <td>

                            <a style="margin-right: 8px;" href="alterarLeitor.php? id=<?= $linha['id'] ?>" class="botao">
                                <i class="fa-solid fa-pen-to-square"></i></a>

                            <button onclick="openModal(<?= $linha['id'] ?>)" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="margin-right: 8px;" name="info" class="botao">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <a href="listarLeitor.php?id=<?= $linha['id'] ?>" class="botao" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">
                                <i class="fa-sharp fa-solid fa-trash"></i> </a>

                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Informações do Usuário
                                    </h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $linha['id'] ?>">
                                        <label for="">Para excluir o Leitor
                                            <?= $linha['nome'] ?>, pressione abaixo:
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate"
                                            name="check">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" name="excluir" class="btn btn-danger"
                                            data-bs-dismiss="modal">Excluir Leitor</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </tbody>
        </table>
        </div>
        </div>
        </center>

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