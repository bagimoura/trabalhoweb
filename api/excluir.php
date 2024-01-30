<?php
    function removeId($id){
        include "conexao.php";
        $sql = "DELETE FROM jogos WHERE id=$id";
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        return $resultado;
    }

    $aux = json_decode(file_get_contents('php://input'), true);
    $id = $aux['id'];
    removeId($id);
?>