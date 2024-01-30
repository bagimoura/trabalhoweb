<?php
    // Receber o valor de entrada
    include "conexao.php";
    $auxiliar = json_decode(file_get_contents('php://input'), true);
    $id = $auxiliar['id'];

    $sql = "SELECT * FROM jogos WHERE id LIKE '%$id%'";

    $resultado = mysqli_query($conexao, $sql);

    $vetor = array();
    $contador = 0;

    while($linha = mysqli_fetch_assoc($resultado))
    {
        $vetor[$contador]['id'] = $linha['id'];
        $vetor[$contador]['jogo'] = $linha['jogo'];
        $vetor[$contador]['nota'] = $linha['nota'];
        $vetor[$contador]['critica'] = $linha['critica'];
        $vetor[$contador]['usuario'] = $linha['usuario'];
        $contador++;
    }

    echo json_encode($vetor);
?>
