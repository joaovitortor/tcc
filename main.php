<?php
require_once("admAutenticacao.php");
require_once("navbar.php");
?>

<section class="home-section">
    <?php require_once("acervo1.php"); ?>

    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Informações do Usuário
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="procurarEmprestimo.php">
                <div class="modal-body">
                    <label for="">Código do Empréstimo:
                    </label>
                    <input class="geekcb-field" placeholder="Código" required type="texto" name="idEmprestimo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" name="procurarEmprestimo" class="btn btn-danger" data-bs-dismiss="modal">Procurar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php require_once("rodape.php");