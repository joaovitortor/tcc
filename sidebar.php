<li><a class="emprestimo-btn">
        <i class="fa-solid fa-arrows-left-right-to-line"></i><span class="link-name">Emprestimo</span></a>
    <ul class="emprestimo-show">
        <li><a href="emprestimo.php" class="text">Cadastrar</a></li>
        <li><a href="listarEmprestimo.php" class="text">Listar</a></li>
        <li><a href="itensDeEmprestimo.php" class="text">Devolução</a></li>
    </ul>
</li>
<li><a class="leitor-btn">
        <i class="fa-solid fa-user"></i><span class="link-name">Leitor</span></a>
    <ul class="leitor-show">
        <li><a href="cadastrarLeitor.php" class="text">Cadastrar</a></li>
        <li><a href="listarLeitor.php" class="text">Listar</a></li>
    </ul>
</li>
<li><a class="livro-btn">
        <i class="fa-solid fa-book"></i><span class="link-name">Livro</span></a>
    <ul class="livro-show">
        <li><a href="cadastrarLivro.php" class="text">Cadastrar</a></li>
        <li><a href="listarLivros.php" class="text">Listar</a></li>
    </ul>
</li>
<li><a class="autor-btn">
        <i class="fa-solid fa-pen-nib"></i><span class="link-name">Autor</span></a>
    <ul class="autor-show">
        <li><a href="cadastrarAutor.php" class="text">Cadastrar</a></li>
        <li><a href="listarAutores.php" class="text">Listar</a></li>
    </ul>
</li>
<li><a class="administrador-btn">
        <i class="fa-solid fa-user-lock"></i><span class="link-name">Administrador</span></a>
    <ul class="administrador-show">
        <li><a href="cadastrarAdministrador.php" class="text">Cadastrar</a></li>
        <li><a href="listarAdministrador.php" class="text">Listar</a></li>
    </ul>
</li>
<li><a class="genero-btn">
        <i class="fa-solid fa-wand-sparkles"></i><span class="link-name">Gênero</span></a>
    <ul class="genero-show">
        <li><a href="cadastrarGenero.php" class="text">Cadastrar</a></li>
        <li><a href="listarGenero.php" class="text">Listar</a></li>
    </ul>
</li>
<li><a class="editora-btn">
        <i class="fa-solid fa-newspaper"></i><span class="link-name">Editora</span></a>
    <ul class="editora-show">
        <li><a href="cadastrarEditora.php" class="text">Cadastrar</a></li>
        <li><a href="listarEditora.php" class="text">Listar</a></li>
    </ul>
</li>

<script>

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