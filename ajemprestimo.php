<?php
require_once("conexao.php");
if (isset($_POST['dataEmprestimo'], $_POST['statusEmprestimo'], $_POST['idLeitor'], $_POST['dataPrevistaDevolucao'])) {
    $dataEmprestimo = $_POST['dataEmprestimo'];
    $statusEmprestimo = $_POST['statusEmprestimo'];
    $idLeitor = $_POST['idLeitor'];
    $dataPrevistaDevolucao = $_POST['dataPrevistaDevolucao'];


    $stmt = $conexao->prepare("INSERT INTO emprestimo (dataEmprestimo, statusEmprestimo, idLeitor, dataPrevistaDevolucao) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssi", $dataEmprestimo, $statusEmprestimo, $idLeitor, $dataPrevistaDevolucao);
    if ($stmt->execute()) {
        echo 'Empréstimo realizado com sucesso.';
    } else {
        echo 'Erro ao realizar empréstimo: ' . $stmt->error;
    }
    $stmt->close();
} else {
    echo 'Dados inválidos recebidos do cliente.';
}
?>