<li><a class="cadastrar-btn">
        <i class="fa-solid fa-cash-register"></i><span class="link-name">Cadastrar</span></a>
    <ul class="cadastrar-show">
        <li><a href="emprestimo.php" class="text">Emprestimo</a></li>
        <li><a href="cadastrarLeitor.php" class="text">Leitor</a></li>
        <li><a href="cadastrarLivro.php" class="text">Livro</a></li>
        <li><a href="cadastrarAutor.php" class="text">Autor</a></li>
        <li><a href="cadastrarAdministrador.php" class="text">Administrador</a></li>
        <li><a href="cadastrarGenero.php" class="text">Gênero</a></li>
        <li><a href="cadastrarEditora.php" class="text">Editora</a></li>
    </ul>
</li>


<li><a class="listar-btn">
        <i class="fa-solid fa-list"></i><span class="link-name">Listar</span></a>
    <ul class="listar-show">
        <li><a href="listarEmprestimo.php" class="text">Emprestimo</a></li>
        <li><a href="listarLeitor.php" class="text">Leitor</a></li>
        <li><a href="listarLivros.php" class="text">Livro</a></li>
        <li><a href="listarAutor.php" class="text">Autor</a></li>
        <li><a href="listarLeitor.php" class="text">Administrador</a></li>
        <li><a href="listarLeitor.php" class="text">Gênero</a></li>
        <li><a href="listarLeitor.php" class="text">Editora</a></li>
    </ul>
</li>

<li><a data-bs-toggle="modal" data-bs-target="#exampleModal3">
        <i class="fa-solid fa-arrows-left-right-to-line"></i><span class="link-name">Devolver</span>
    </a>
</li>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Informações do Usuário
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    <label for="">Para excluir o Leitor
                        <?= $linha['nome'] ?>, pressione abaixo:
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" name="check">
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

<script>

    $('.cadastrar-btn').click(function () {
        $('nav ul .cadastrar-show').toggleClass("show");
    })
    $('.listar-btn').click(function () {
        $('nav ul .listar-show').toggleClass("show");
    })
    $('.emprestimo-btn').click(function () {
        $('nav ul .emprestimo-show').toggleClass("show");
    })
    $('.leitor-btn').click(function () {
        $('nav ul .leitor-show').toggleClass("show");
    })
    $('.livro-btn').click(function () {
        $('nav ul .livro-show').toggleClass("show");
    })
    $('.autor-btn').click(function () {
        $('nav ul .autor-show').toggleClass("show");
    })
    $('.administrador-btn').click(function () {
        $('nav ul .administrador-show').toggleClass("show");
    })
    $('.genero-btn').click(function () {
        $('nav ul .genero-show').toggleClass("show");
    })
    $('.editora-btn').click(function () {
        $('nav ul .editora-show').toggleClass("show");
    })
</script>
<script src="js/script.js"></script>
<script src="js/bootstrap.bundle.js"></script>