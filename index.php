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

    <div style="align-items: right" class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="fa-solid fa-user"></i>|
        </div>
    </div>
    <br><br><br>
    <h1 class="titulo text">Bibliotech<a href="cadastrarLeitor.php" class="botao">
            <i class="fa-solid fa-plus"></i>
        </a></h1>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Login</h2>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" name="excluir" class="btn btn-danger" data-bs-dismiss="modal">Excluir
                            Leitor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>