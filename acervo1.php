<?php
require_once("conexao.php");

$V_WHERE = "";
if (isset($_POST['pesquisar'])) { // botao pesquisar
    $V_WHERE = " AND livro.titulo LIKE '%{$_POST['pesquisa']}%' ";

}

$sql = "SELECT livro.id, editora.nome as nomeEditora, genero.nome as nomeGenero, livro.statusLivro, livro.titulo, livro.pag, livro.isbn, livro.edicao, livro.arquivo as arquivo
        FROM livro
        LEFT JOIN editora ON livro.idEditora = editora.id
        LEFT JOIN genero ON livro.idGenero = genero.id
        WHERE 1 {$V_WHERE}";


//3. Executa a SQL
$resultado = mysqli_query($conexao, $sql);

?>

<h1 class="titulo text">Acervo</h1><br><br>
<center>
    <form method="post">
        <label name="pesquisa" for="exampleFormControlInput1" class="titulo text">Pesquisar</label>
        <div class="input-button-container">
            <input name="pesquisa" type="text" class="formcampo">
            <button name="pesquisar" stype="button" class="botaopesquisar">Pesquisar</button>
            <a href="acervo.php"><button name="voltar" stype="button" class="botaopesquisar">Voltar</button></a>
        </div>
        <br><br>
    </form><br><br>
</center>



<?php while ($linha = mysqli_fetch_array($resultado)) { ?>


    <div class="wrapperAcervo">

        <div class="containerAcervo">
            <div style="background-image: url('uploads/<?= $linha['arquivo'] ?>')" class="topAcervo"></div>
            <div class="bottomAcervo">
                <div class="leftAcervo">
                    <div class="detailsAcervo">
                        <h5 style="width: 50%; margin-top: 5%; text-align:center">
                            <?= $linha['titulo'] ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="insideAcervo">
            <div class="icon"><i class="fa-solid fa-plus"></i></div>
            <div class="contentsAcervo">
                <table>
                    <tr>
                        <th>Código do livro: </th>
                        <td>
                            <?= $linha['id'] ?>
                        </td>

                    </tr>

                    <tr>
                        <th>Status do livro: </th>
                        <td>
                            <?= $linha['statusLivro'] ?>
                        </td>

                    </tr>
                    <tr>
                        <th>Autor(es): </th>
                        <td>

                            <?php
                            $idLivro = $linha['id'];
                            $sqlAutores = "SELECT autor.nome FROM livroautor
                                            JOIN autor ON livroautor.idAutor = autor.id
                                            WHERE livroautor.idLivro = $idLivro";

                            $resultadoAutor = mysqli_query($conexao, $sqlAutores);

                            $autores = array();
                            while ($linhaAutor = mysqli_fetch_array($resultadoAutor)) {
                                $autores[] = $linhaAutor['nome'];

                            }
                            echo implode(', ', $autores);

                            ?>

                        </td>
                    </tr>
                    <tr>
                        <th>ISBN: </th>
                        <td>
                            <?= $linha['isbn'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>N° de páginas: </th>
                        <td>
                            <?= $linha['pag'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Gênero: </th>
                        <td>
                            <?= $linha['nomeGenero'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Editora: </th>
                        <td>
                            <?= $linha['nomeEditora'] ?>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
    </div>


<?php } ?>




<script>
    $('.buyAcervo').click(function () {
        $('.bottomAcervo').addClass("clicked");
    });

    $('.removeAcervo').click(function () {
        $('.bottomAcervo').removeClass("clicked");
    });
</script>