<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from autor where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}


$V_WHERE = "";
if (isset($_POST['pesquisar'])) { //se clicou no botao pesquisar
    $V_WHERE = " and nome like '%" . $_POST['nome'] . "%' ";
}

//2. Preparar a sql
$sql = "select * from autor
where 1 = 1" . $V_WHERE;

$nomeAutor = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);

if(!empty($nomeAutor)){

   $pesq_autores = "%" . $nomeAutor . "%"; 

$query_autor = "SELECT id, nome FROM autor WHERE nome LIKE :nome LIMIT 20";
$result_autores = $conexao->prepare($query_autores);
$result_autores ->bindParam(':nome', $pesq_autores);
$result_autores->execute();

if(($result_autores) and ($result_autores->rowCont() != 0)){
    while($row_autor = $result_autores->fetch(PDO::FETCH_ASSOC)){
        $dados[] = $row_autor;
    }
    $retorna = ['status' => true, 'dados' => $dados];
} else{
    $retorna = ['status' => false, 'msg' => "Erro: nenhum produto encontrado!"];
}

$retorna = ['status' => true,'msg' => 'Autor encontrado!'];
}

echo json_encode($retorna);

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);


?>

<?php require_once("navbar.php"); ?>
        <br><br><br>
        <h1 class="titulo">Listagem de Autores  <a href="cadastrarAutores.php" class="botao">
                                <i class="fa-solid fa-plus"></i>
                            </a></h1>
        
        <br><br>


        <center>
            <form method="post">
                <label name="nome" for="exampleFormControlInput1" class="titulo">Pesquisar</label>
                <div class="input-button-container">
                    <input name="nome" type="text" class="formcampo">
                    <button name="pesquisar" stype="button" class="botaopesquisar">Pesquisar</button>
                    <a href="listarAutores.php"><button name="voltar" stype="button" class="botaopesquisar">Voltar</button></a>
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

                                    <a style="margin-right: 8px;" href="alterarAutor.php? id=<?= $linha['id'] ?>"
                                        class="botao">
                                        <i class="fa-solid fa-pen-to-square"></i></a>


                                    <a href="listarAutores.php? id=<?= $linha['id'] ?>" class="botao"
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