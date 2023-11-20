<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from emprestimo where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}


$V_WHERE = "";
if (isset($_POST['pesquisar'])) { // botao pesquisar
    $V_WHERE = " and titulo like '%" . $_POST['titulo'] . "%' ";
}

//2. Preparar a sql
$sql = "SELECT emprestimo.id, leitor.nome as nomeLeitor, statusEmprestimo, dataEmprestimo, dataPrevistaDevolucao, valorMulta, dataDevolucao
        FROM emprestimo 
        LEFT JOIN leitor ON emprestimo.idLeitor = leitor.id     
        WHERE 1 = 1 AND statusEmprestimo = 'Em andamento'" . $V_WHERE;

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);


?>

<?php require_once("navbar.php"); ?>
<br><br><br>
<h1 class="titulo">Listagem de empréstimos ativos<a href="emprestimo.php" class="botao">
        <i class="fa-solid fa-plus"></i>
    </a></h1>

<br><br>


<center>
<form method="post">
        <label name="titulo" for="exampleFormControlInput1" class="titulo">Pesquisar</label>
        <div class="input-button-container">
            <input name="titulo" type="text" class="formcampo">
            <button name="pesquisar" stype="button" class="botaopesquisar">Pesquisar</button>
            <a href="listarLivros.php"><button name="voltar" stype="button" class="botaopesquisar">Voltar</button></a>
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
                        <td scope="col"><b>Leitor</b></td>
                        <td scope="col"><b>Data do Emp.</b></td>
                        <td scope="col"><b>Data prevista dev.</b></td>
                        <td scope="col"><b>Livros</b></td>
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
                                <?= $linha['statusEmprestimo'] ?>
                            </td>
                            <td>
                                <?= $linha['nomeLeitor'] ?>
                            </td>
                            <td>
                                <?= date("d/m/Y", strtotime($linha['dataEmprestimo'])); ?>
                            </td>
                            <td>
                                <?= date("d/m/Y", strtotime($linha['dataPrevistaDevolucao'])) ?>
                            </td>
                            <td>
                                <?php
                                $idEmprestimo = $linha['id'];
                                $sqlLivros = "SELECT livro.titulo FROM itensdeemprestimo
                                            JOIN livro ON itensdeemprestimo.idLivro = livro.id
                                            WHERE itensdeemprestimo.idEmprestimo = $idEmprestimo";

                                $resultadoLivros = mysqli_query($conexao, $sqlLivros);

                                $titulosLivros = array();
                                while ($linhaLivro = mysqli_fetch_array($resultadoLivros)) {
                                    $titulosLivros[] = $linhaLivro['titulo'];
                                }

                                echo implode(', ', $titulosLivros);
                                ?>
                            </td>

                            <td>
                                <a style="margin-right: 8px;" href="alterarEmprestimo.php? id=<?= $linha['id'] ?>"
                                    class="botao">
                                    <i class="fa-solid fa-pen-to-square"></i></a>

                                <a data-bs-toggle="modal" data-bs-target="#exampleModal_<?= $linha['id'] ?>"
                                    style="margin-right: 8px;" name="info" class="botao">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="listarEmprestimo.php? id=<?= $linha['id'] ?>" class="botao"
                                    onclick="return confirm('Deseja mesmo excluir o cadastro?')">
                                    <i class="fa-sharp fa-solid fa-trash"></i> </a>

                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal_<?= $linha['id'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel">
                                            <?php echo "Leitor " . $linha['nomeLeitor']; ?>
                                        </h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                    </div>
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
</body>

</html>