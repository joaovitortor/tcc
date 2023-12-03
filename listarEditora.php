<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

require_once("admAutenticacao.php");
$voltar = "";
// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sqlVerificarEditora = "SELECT * FROM livro WHERE idEditora = " . $_GET['id'];
    $resultadoVerificarEditora = mysqli_query($conexao, $sqlVerificarEditora);

    if (mysqli_num_rows($resultadoVerificarEditora) > 0) {
        // O leitor possui empréstimos pendentes, não permitir a exclusão
        $mensagemAlert = "Não é possível excluir a Editora. Há livros cadastrados com ele.";
    } else {
        // Não existem empréstimos pendentes, prosseguir com a exclusão
        $sqlExcluirLeitor = "DELETE FROM editora WHERE id = " . $_GET['id'];
        mysqli_query($conexao, $sqlExcluirLeitor);
        $mensagem = "Exclusão realizada com sucesso.";
    }
}


$V_WHERE = "";
if (isset($_POST['pesquisar'])) { //se clicou no botao pesquisar
    $V_WHERE = " and nome like '%" . $_POST['nome'] . "%' ";
    $voltar = '<a href="listarEditora.php"><button name="voltar" stype="button" class="botaopesquisar">Voltar</button></a>';
}

//2. Preparar a sql
$sql = "select * from editora
where 1 = 1" . $V_WHERE;

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);

?>

<?php require_once("navbar.php"); ?>
<br><br><br>
<?php require_once("mensagem.php"); ?>
<h1 class="titulo text">Listagem de Editoras <a href="cadastrarEditora.php" class="botao">
        <i class="fa-solid fa-plus"></i>
    </a></h1>

<br><br>


<center>
    <form method="post">
        <label name="nome" for="exampleFormControlInput1" class="titulo text">Pesquisar</label>
        <div class="input-button-container">
            <input name="nome" type="text" class="formcampo">
            <button name="pesquisar" stype="button" class="botaopesquisar"><i class="fa-solid fa-magnifying-glass"></i></button>
            <?php echo $voltar ?>
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
                        <td scope="col"><b>Ações</b></td>
                    </tr>
                </thead>
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
                                <?= $linha['nome'] ?>
                            </td>
                            <td>

                                <a style="margin-right: 8px;" href="alterarEditora.php? id=<?= $linha['id'] ?>"
                                    class="botao">
                                    <i class="fa-solid fa-pen-to-square"></i></a>


                                <a href="listarEditora.php? id=<?= $linha['id'] ?>" class="botao"
                                    onclick="return confirm('Deseja mesmo excluir o cadastro?')">
                                    <i class="fa-sharp fa-solid fa-trash"></i> </a>

                            </td>
                        </tr>

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
</body>

</html>