<?php
        function buscarTodos()
        {
            include "conexao.php";
            $sql = "SELECT * FROM jogos";
            $res = mysqli_query($conexao, $sql);
            mysqli_close($conexao);
            return $res;
        }
    
                    $vetor = array();
                    $contador = 0;
                    $res = buscarTodos();

                        if($res){
                            while(($linha = mysqli_fetch_assoc($res)) != NULL){

                                $vetor['id'][$contador] = $linha['id'];
                                $vetor['jogo'][$contador] = $linha['jogo'];
                                $vetor['nota'][$contador] = $linha['nota'];
                                $vetor['critica'][$contador] = $linha['critica'];
                                $vetor['usuario'][$contador] = $linha['usuario'];
                                $contador++;
                            }

                        }else{
                            //echo "<tr><td colspan='5'>Não existem registros!</td></tr>";
                            $vetor['erro'] = "Não existem registros!";
                        }

                        echo json_encode($vetor);
?>
           