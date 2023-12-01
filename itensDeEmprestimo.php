<?php

require_once("conexao.php");

require_once("admAutenticacao.php");

$multa = "";
$voltar = "";
$V_WHERE = "";
if (isset($_POST['pesquisar'])) { // botao pesquisar
    $V_WHERE = " and livro.titulo like '% " . $_POST['pesquisa'] . "%' ";
}
$idEmprestimo = $_GET['id'];

$sqlNome = "select leitor.nome, leitor.id as idLeitor from emprestimo 
            inner join leitor ON emprestimo.idLeitor = leitor.id";

$sqlData = "select dataEmprestimo from emprestimo 
 where id = " . $idEmprestimo;

$nomeLeitor = mysqli_query($conexao, $sqlNome);
$dataEmprestimo = mysqli_query($conexao, $sqlData);
$row = mysqli_fetch_assoc($nomeLeitor);


$livrosSelecionados = array(); // Array para armazenar os IDs dos livros selecionados

if (isset($_POST['devolver'])) {
    $idEmprestimo = $_POST['idEmprestimo'];

    // Verifica se o checkbox foi marcado
    if (isset($_POST['idLivro']) && is_array($_POST['idLivro'])) {
        $livrosSelecionados = $_POST['idLivro'];
        $dataAtual = date("Y-m-d");

        // Percorre os livros selecionados
        foreach ($livrosSelecionados as $idLivro) {

            $sqlDataPrevDev = "SELECT dataPrevDev FROM itensdeemprestimo WHERE idLivro = $idLivro AND idEmprestimo = $idEmprestimo";
            $resultDataPrevDev = mysqli_query($conexao, $sqlDataPrevDev);
            $linhaDataPrevDev = mysqli_fetch_assoc($resultDataPrevDev);

            $dataPrevista = strtotime($linhaDataPrevDev['dataPrevDev']);
            $dataDevolucao = strtotime($dataAtual);

            // Calcula a diferença em dias
            $diferencaEmDias = ($dataDevolucao - $dataPrevista) / (60 * 60 * 24);

            if ($diferencaEmDias > 0) {
                // O livro foi devolvido com atraso
                $multa = +($diferencaEmDias * 1);
            } else {
                // O livro foi devolvido no prazo
            }

            // Realiza a atualização no banco de dados para marcar como devolvido
            $sql = "UPDATE itensdeemprestimo SET statusItem = 'Devolvido', dataDevolvido = '$dataAtual', multa = '$multa' WHERE idLivro = $idLivro AND idEmprestimo = $idEmprestimo";

            mysqli_query($conexao, $sql);

            $sql = "UPDATE livro SET statusLivro = 'Disponível' WHERE id = $idLivro";
            mysqli_query($conexao, $sql);

        }

        $sqlStatusItem = "SELECT DISTINCT statusItem FROM itensdeemprestimo WHERE idEmprestimo = $idEmprestimo";
        $resultStatusItem = mysqli_query($conexao, $sqlStatusItem);
        $statusItens = mysqli_fetch_all($resultStatusItem, MYSQLI_ASSOC);

        $todosDevolvidos = count($statusItens) == 1 && $statusItens[0]['statusItem'] == 'Devolvido';

        if ($todosDevolvidos) {
            $sql = "UPDATE emprestimo SET statusEmprestimo = 'Finalizado' WHERE id = $idEmprestimo";
            mysqli_query($conexao, $sql);
            $sql = "UPDATE leitor SET status = 'Ativo' WHERE id = $row[idLeitor]";
            mysqli_query($conexao, $sql);
        }
    }
}

if (isset($_POST['renovar'])) {
    if (isset($_POST['idLivro']) && is_array($_POST['idLivro'])) {
        $livrosSelecionados = $_POST['idLivro'];
        // Percorre os livros selecionados
        foreach ($livrosSelecionados as $idLivro) {

            $dataAtual = date("Y-m-d");

            // Realiza a atualização no banco de dados para marcar como renovado
            $sql = "UPDATE itensdeemprestimo SET statusItem = 'Renovado', dataRenovacao = '$dataAtual' WHERE idLivro = $idLivro AND idEmprestimo = $idEmprestimo";
            mysqli_query($conexao, $sql);

            // Atualiza a data prevista de devolução para 7 dias após a renovação
            $dataPrevDev = date('Y-m-d', strtotime("+7 days", strtotime($dataAtual)));
            $sqlDataDev = "UPDATE itensdeemprestimo SET dataPrevDev = '$dataPrevDev' WHERE idLivro = $idLivro AND idEmprestimo = $idEmprestimo";
            mysqli_query($conexao, $sqlDataDev);
        }
    }
}

//2. Preparar a sql
$sql = "SELECT emprestimo.id as idEmprestimo, livro.titulo as titulo, statusItem, dataDevolvido, dataPrevDev as dataPrevista, livro.id as idLivro
        FROM itensDeEmprestimo 
        INNER JOIN livro ON itensDeEmprestimo.idLivro = livro.id 
        LEFT JOIN emprestimo ON itensDeEmprestimo.idEmprestimo = emprestimo.id     
        WHERE idEmprestimo = $idEmprestimo" . $V_WHERE;

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);


?>

<?php require_once("navbar.php"); ?>
<br><br><br>
<h1 class="titulo">Itens de Empréstimo</h1>

<center>
    <form method="post">
        <input type="hidden" name="idEmprestimo" value="<?php echo $_GET['id'] ?>">
        <?php echo $multa; ?>
        <br><br>
        <div class="card cardlistar">
            <div class="card-body cardlistar2">

                <table class="table">
                    <thead>
                        <tr>
                            <div style="display: flex; justify-content: space-between;">
                                <h5 style="margin-right: ">Leitor(a):
                                    <?php 
                                    echo $row['nome']; ?>
                                </h5>
                                <h5>Data Emprestimo
                                    <?php $row = mysqli_fetch_assoc($dataEmprestimo);
                                    $dataEmpres = date("d/m/Y", strtotime($row['dataEmprestimo']));
                                    echo $dataEmpres ?>
                                </h5>
                            </div>
                        </tr>
                        <tr>
                            <td scope="col"><b>ID do Empréstimo</b></td>
                            <td scope="col"><b>Item</b></td>
                            <td scope="col"><b>Status</b></td>
                            <td scope="col"><b>Data Prevista</b></td>
                            <td scope="col"><b>Data devolvido</b></td>
                            <td scope="col"><b>Selecionar livro</b></td>
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
                                    <?= date("d/m/Y", strtotime($linha['dataPrevista'])) ?>
                                </td>
                                <td>
                                    <?php isset($linha['dataDevolvido']) ? $data = date("d/m/Y", strtotime($linha['dataDevolvido'])) : $data = "";
                                    echo $data ?>
                                </td>
                                <td>
                                    <input class="form-check-input" type="checkbox" name="idLivro[]"
                                        value=" <?= $linha['idLivro'] ?>">
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
                <button name="devolver" type="submit" class="botaopesquisar" style="margin-top: 10pt">Devolver</button>
                <button name="finalizar" type="submit" class="botaopesquisar"
                    style="margin-top: 10pt">Finalizar</button>
                <button name="renovar" type="submit" class="botaopesquisar" style="margin-top: 10pt">Renovar</button>
    </form>
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