<?php
    function editarId(){
        include "conexao.php";
        include "form_editar.php";

        $aux = json_decode(file_get_contents('php://input'), true);
        $id = $aux['id'];
        $jogo = $aux['jogo'];
        $nota = $aux['nota'];
        $critica = $aux['critica'];
        $usuario = $aux['usuario'];

        $sql = "UPDATE jogos
            SET jogo = '$jogo',
                nota= '$nota',
                critica= '$critica', 
                usuario= '$usuario' 
            WHERE id=$id";

            echo $sql;
            mysqli_query($conexao, $sql);
            mysqli_close($conexao);
    }

    $auxiliar = json_decode(file_get_contents('php://input'), true);

    editarId(); 
?>
