<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
/*if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from emprestimo where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}*/
$voltar = "";
$V_WHERE = "";
if (isset($_POST['pesquisar'])) { // botao pesquisar
    $V_WHERE = " and livro.titulo like '% " . $_POST['pesquisa'] . "%' ";
    $voltar = '<a href="listarLivros.php"><button name="voltar" stype="button" class="botaopesquisar">Voltar</button></a>';
}
$idEmprestimo = $_GET['id'];

$livrosSelecionados = array(); // Array para armazenar os IDs dos livros selecionados

if (isset($_POST['devolver'])) {
    $idEmprestimo = $_POST['idEmprestimo'];

    // Verifica se o checkbox foi marcado
    if (isset($_POST['idLivro']) && is_array($_POST['idLivro'])) {
        $livrosSelecionados = $_POST['idLivro'];
        $dataAtual = date("Y-m-d");
        // Percorre os livros selecionados
        foreach ($livrosSelecionados as $idLivro) {

            // Realiza a atualização no banco de dados para marcar como devolvido
            $sql = "UPDATE itensdeemprestimo SET statusItem = 'Devolvido', dataDevolvido = '$dataAtual' WHERE idLivro = $idLivro AND idEmprestimo = $idEmprestimo";
            mysqli_query($conexao, $sql);
            $sql = "UPDATE livro SET statusLivro = 'Disponível' WHERE id = $idLivro";
            mysqli_query($conexao, $sql);
        }

        // Outras ações após a devolução, se necessário
    }
}


//2. Preparar a sql
$sql = "SELECT emprestimo.id as idEmprestimo, livro.titulo as titulo, statusItem, dataDevolvido, livro.id as idLivro
        FROM itensDeEmprestimo 
        INNER JOIN livro ON itensDeEmprestimo.idLivro = livro.id 
        LEFT JOIN emprestimo ON itensDeEmprestimo.idEmprestimo = emprestimo.id     
        WHERE idEmprestimo = $idEmprestimo" . $V_WHERE;

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);


?>

<?php require_once("navbar.php"); ?>
<br><br><br>
<h1 class="titulo">Itens de Empréstimo<a href="emprestimo.php" class="botao">
        <i class="fa-solid fa-plus"></i>
    </a></h1>

<br><br>


<center>
    <form method="post">
        <input type="hidden" name="idEmprestimo" value="<?php echo $_GET['id'] ?>">
        <label name="pesquisa" for="exampleFormControlInput1" class="titulo">Pesquisar</label>
        <div class="input-button-container">
            <input name="pesquisa" type="text" class="formcampo">
            <button name="pesquisar" stype="button" class="botaopesquisar">Pesquisar</button>
            <?php echo $voltar; ?>
        </div>
        <div class="input-button-container">
            <button name="devolver" type="submit" class="botaopesquisar" style="margin-top: 10pt">Devolver</button>
            <button name="finalizar" type="submit" class="botaopesquisar" style="margin-top: 10pt">Finalizar</button>
        </div>
        <br><br>

        <div class="card cardlistar">
            <div class="card-body cardlistar2">
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"><b>ID do Empréstimo</b></td>
                            <td scope="col"><b>Item</b></td>
                            <td scope="col"><b>Status</b></td>
                            <td scope="col"><b>Data devolvido</b></td>
                            <td scope="col"><b>Devolvido</b></td>
                            <td scope="col"><b>Ação</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <td>
                                    <?= $linha['idEmprestimo'] ?>
                                </td>
                                <input type="hidden" name="idEmprestimo" value="<?= $linha['idEmprestimo'] ?>">
                                <td>
                                    <?= $linha['titulo'] ?>
                                </td>
                                <td>
                                    <?= $linha['statusItem'] ?>
                                </td>
                                <td>
                                    <?php isset($linha['dataDevolvido']) ? $data = date("d/m/Y", strtotime($linha['dataDevolvido'])) : $data = "";
                                    echo $data ?>
                                </td>
                                <td>
                                    <input class="form-check-input" type="checkbox" name="idLivro[]"
                                        value="<?= $linha['idLivro'] ?>">
                                </td>

                                <td>
                                    <button style="margin-right: 8px;" name="alterar" class="botao">
                                        <i class="fa-solid fa-pen-to-square"></i></button>

                                    <a style="margin-right: 8px;"
                                        href="itensDeEmprestimo.php? id=<?= $linha['idEmprestimo'] ?>" class="botao">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="listarEmprestimo.php? id=<?= $linha['idEmprestimo'] ?>" class="botao"
                                        onclick="return confirm('Deseja mesmo excluir o cadastro?')">
                                        <i class="fa-sharp fa-solid fa-trash"></i> </a>

                                </td>
                            </tr>
        </form>
        <div class="modal fade" id="exampleModal_<?= $linha['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">
                            <?php echo "Leitor " . $linha['nomeLeitor']; ?>
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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