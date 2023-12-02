<?php 

if(isset($mensagem)) {
    echo '<div class="alert alert-success" style="text-align :center" role="alert">' . $mensagem . '</div>';
} 
if(isset($mensagemAlert)) {
    echo '<div class="alert alert-danger" style="text-align :center" role="alert">' . $mensagemAlert . '</div>';
} 

?>

