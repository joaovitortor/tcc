<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

$voltar = "";
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


//2. Preparar a sql
$sql = "select * from leitor
where 1 = 1" . $V_WHERE;

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);

if (isset($_GET['mensagemAlert'])) {
    $mensagemAlert = $_GET['mensagemAlert'];
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/acervo.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="shortcut icon" href="logo.ico">

    <title> Bibliotech </title>
</head>

<body style="background-color: #ffd8be;">

    <div style="align-items: right" class="navbar bg-body-tertiary">
        <div style="align-content: right" class="container-fluid">
            <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="fa-solid fa-user" style="padding-left: 2%; padding-right: 3%; cursor: pointer"> Login</i>
        </div>
    </div>
    <br><br><br>
    <?php
    if (isset($mensagemAlert)) {
        require_once('mensagem.php');
    }
    if(isset($_POST['pesquisar'])) {
        $voltar = '<a href="acervo.php" style="text-decoration: none"><button name="voltar" stype="button" class="botaopesquisarAcervo">Voltar</button></a>';
    }
    ?>

    <h1 class="titulo"> <img src="logobiblio.png" alt="logo" width="5%"> Bibliotech</h1>

    <center>
        <form method="post">
            <label name="pesquisa" for="exampleFormControlInput1" class="titulo">Pesquisar livros no acervo da
                biblioteca</label>
            <div class="input-button-container">
                <input name="pesquisa" type="text" class="formcampo">
                <button name="pesquisar" stype="button" class="botaopesquisarAcervo"><i
                        class="fa-solid fa-magnifying-glass"></i>
                </button>
                <?= $voltar; ?>
            </div>
            <br><br>
        </form>
    </center>

    <div class="acervocontainer">

        <?php require_once('acervo1.php') ?>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Login</h2>
                </div>
                <form action="autenticacao.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="geekcb-field" placeholder="E-mail" required type="text" name="email"
                                id="email">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input class="geekcb-field" placeholder="Senha" required type="password" name="senha"
                                id="senha">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="geekcb-btn" type="button" data-bs-dismiss="modal">Fechar</button>
                        <button class="geekcb-btn" type="submit" name="entrar">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>