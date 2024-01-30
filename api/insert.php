<?php
    include "conexao.php";

    $aux = json_decode(file_get_contents('php://input'), true);

    $jogo = $aux['jogo'];
    $nota = $aux['nota'];
    $critica = $aux['critica'];
    $usuario = $aux['usuario'];

    $sql = "INSERT INTO jogos (jogo, nota, critica, usuario) 
            VALUE ('$jogo', '$nota', '$critica', '$usuario')";

    mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    $vetor = array('msg', 'Enviado com sucesso!');
    echo json_encode($vetor);
?>