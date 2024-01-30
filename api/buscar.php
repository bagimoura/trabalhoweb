<?php
    include "conexao.php";
    // Receber o valor de entrada
    $auxiliar = json_decode(file_get_contents('php://input'), true);
    $buscar = $auxiliar['buscar'];

    $sql = "SELECT jogo FROM jogos WHERE jogo LIKE '%$buscar%'";

    $resultado = mysqli_query($conexao, $sql);

    $vetor = array();
    $contador = 0;

    while($linha = mysqli_fetch_assoc($resultado))
    {
        $vetor[$contador]['jogo'] = $linha['jogo'];
        $contador++;
    }

    echo json_encode($vetor);
?>