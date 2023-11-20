<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from livro where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}


$V_WHERE = "";
if (isset($_POST['pesquisar'])) { // botao pesquisar
    $V_WHERE = " and titulo like '%" . $_POST['titulo'] . "%' ";
}

//2. Preparar a sql
$sql = "SELECT livro.id, editora.nome as nomeEditora, genero.nome as nomeGenero, livro.statusLivro, livro.titulo, livro.pag, livro.isbn, livro.edicao, livro.arquivo as arquivo
        FROM livro
        LEFT JOIN editora ON livro.idEditora = editora.id
        LEFT JOIN genero ON livro.idGenero = genero.id
        WHERE 1 = 1" . $V_WHERE;

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);


?>

<?php require_once("navbar.php"); ?>
<br><br><br>
<h1 class="titulo">Listagem de Livros <a href="cadastrarLivro.php" class="botao">
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
<?php 
$MostraLivro = '<img src="$nomeArquivo" alt="">';
?>
<center>
    <div class="card cardlistar">
        <div class="card-body cardlistar2">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b>ID</b></td>
                        <td scope="col"><b>Editora</b></td>
                        <td scope="col"><b>Gênero</b></td>
                        <td scope="col"><b>Status</b></td>
                        <td scope="col"><b>Título</b></td>
                        <td scope="col"><b>Página</b></td>
                        <td scope="col"><b>ISBN</b></td>
                        <td scope="col"><b>Edição</b></td>
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
                                <?= $linha['nomeEditora'] ?>
                            </td>
                            <td>
                                <?= $linha['nomeGenero'] ?>
                            </td>
                            <td>
                                <?= $linha['statusLivro'] ?>
                            </td>
                            <td>
                                <?= $linha['titulo'] ?>
                            </td>
                            <td>
                                <?= $linha['pag'] ?>
                            </td>
                            <td>
                                <?= $linha['isbn'] ?>
                            </td>
                            <td>
                                <?= $linha['edicao'] ?>
                            </td>

                            <td>

                                <a style="margin-right: 8px;" href="alterarLivro.php? id=<?= $linha['id'] ?>" class="botao">
                                    <i class="fa-solid fa-pen-to-square"></i></a>

                                <a data-bs-toggle="modal" data-bs-target="#exampleModal_<?= $linha['id'] ?>"
                                    style="margin-right: 8px;" name="info" class="botao">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="listarAutores.php? id=<?= $linha['id'] ?>" class="botao"
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
                                            <?php echo "Livro " . $linha['titulo']; ?>
                                        </h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo "uploads/" . $linha['arquivo'] ?>" alt="">
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