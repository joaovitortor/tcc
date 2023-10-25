<?php
//1. Conecta no banco de dados (IP, usuario, senha, nome do banco)
//require_once("verificaautenticacao.php");
require_once("conexao.php");

// Excluir
if (isset($_GET['id'])) { // Verifica se o botão excluir foi clicado
    $sql = "delete from editora where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}

//2. Prepara a SQL
$sql = "select * from editora";

//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);
?>

<?php require_once("navbar.php"); ?>

                <!--<img src="images/profile.jpg" alt="">-->
            </div>
            <div class="geekcb-wrapper">       
                
                <form method="post" class="geekcb-form-contact">
      
                    <div class="listar">
                        <h2 style="font-family: 'Fjalla One'; text-align: center">Listagem de Editoras
                            <a href="cadastrarEditora.php" class="botao">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </h2><br>
                        <table>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Status</td>
                                    <td>Nome</td>
                                </tr>
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

                                            <a style="margin-right: 8px;" href="alterarEditora.php? id=<?= $linha['id'] ?>" class="botao">
                                                <i class="fa-solid fa-pen-to-square"></i></a>


                                            <a href="listarGenero.php? id=<?= $linha['id'] ?>" class="botao"
                                                onclick="return confirm('Deseja mesmo excluir o cadastro?')">
                                                <i class="fa-sharp fa-solid fa-trash"></i> </a>

                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </form>
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
</body>

</html>