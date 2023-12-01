<?php 

if(isset($mensagem)) {
    echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
} 
if(isset($mensagemAlert)) {
    echo '<div class="alert alert-danger" role="alert">' . $mensagemAlert . '</div>';
} 

?>

