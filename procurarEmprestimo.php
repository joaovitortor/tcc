<?php
require_once("conexao.php");
if (isset($_POST["procurarEmprestimo"])) {
    $idEmprestimo = $_POST['idEmprestimo'];
    $sql = "select statusEmprestimo from emprestimo where id = $idEmprestimo";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $linha = mysqli_fetch_array($resultado);
        $statusEmprestimo = $linha['statusEmprestimo'];
        if ($statusEmprestimo == 'Finalizado') {
            echo 'Empréstimo Finalizado';
        } else {
    header("Location: itensDeEmprestimo.php?id=$idEmprestimo");
        }
    } else {
        // Nenhuma linha encontrada, lide conforme necessário
        echo "Nenhum empréstimo encontrado com o ID: $idEmprestimo";
    }
}

?>