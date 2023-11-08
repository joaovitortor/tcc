//1. conectar no banco de dados (ip, usuario, senha, nome do banco)
require_once("conexao.php");
$sql = "SELECT autor.id, autor.nome
FROM autor
INNER JOIN livroautor ON autor.id = livroautor.idAutor
WHERE livroautor.idLivro = '$idLivro'";
$idAutor = $_POST['idAutor'];
$resultado = mysqli_query($conexao, $sql);
if (isset($_POST['cadastrar'])) {
    //2. Receber os dados para inserir no BD
    $status = $_POST['status'];
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $edicao = $_POST['edicao'];
    $pag = $_POST['pag'];
    $idEditora = $_POST['idEditora'];
    $idGenero = $_POST['idGenero'];
    //3. preparar sql para inserir
    $sql = "insert into livro (status, titulo, isbn, edicao, pag, idEditora, idGenero)
values ('$status', '$titulo', '$isbn', '$edicao', '$pag',' $idEditora', $idGenero')";
    //4. executar sql no bd
    mysqli_query($conexao, $sql);
    //5.mostrar uma mensagem ao usuário
    $mensagem = "Cadastro realizado com sucesso!";
}
    $sql = "INSERT INTO livroautor (idLivro, idAutor) VALUES ('$idLivro', '$idAutor')";
    mysqli_query($conexao, $sql);
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="pt-br">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--muda a fonte-->
    <script src="https://kit.fontawesome.com/e507e7a758.js" crossorigin="anonymous"></script>
    <!----======== CSS ======== -->
                    </div>
                    <h1 class="titulo" name="tituloLivro">
                        <?php echo $_GET['tituloLivro']; ?>
                    </h1>
           
                    <form action="">
                    </h1><br>
                    <form method="POST">
                         <input type="hidden" name="idLivro" value="<?php echo $idLivro; ?>">
                        <div class="row">
                            <div class="col-12">
                                <div class=form-group>
                                    <label for="">Selecione o autor</label>
                                    <select name="select-autor" id="select-autor"></select>
                               
                                    <label for="select-autor">Selecione o autor</label>
                                    <select name="idAutor" class="geekcb-field" id="idAutor">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                    
                        </div>
                        <br><br>
                        <button class="geekcb-btn" type="submit" name="cadastrar">Cadastrar</button>
                    </form>
    <script>
        $(document).ready(function() {
            $('#select-autor')
        $(document).ready(function () {
            $('#idAutor').select2();
        });
    </script>
</body>