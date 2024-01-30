<?php
    $conexao = mysqli_connect("localhost", "Gabriela", "gabriela", "api");

    if(!$conexao) {
        echo mysqli_connect_error();
        die();
    }
?>