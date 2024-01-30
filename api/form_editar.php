<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/editar.css">
</head>
<body>
    <div class="form">
        <p class="heading">FORMULÁRIO DE EDIÇÃO</p>
        <input type="text" name="jogo" id="jogoEdit" placeholder="Nome do jogo" class="input"required/>
        <input type="text" name="nota" id="notaEdit" placeholder="Nota" class="input" required/>
        <input type="text" name="critica" id="criticaEdit" placeholder="Crítica" class="input" required/>
        <input type="text" name="usuario" id="usuarioEdit" placeholder="Usuário" class="input" required/>
        <button id="botao" class="btn">Enviar</button>
        <a href="../index.html">Voltar ao início</a>
        <a href="../show.html">Voltar</a>
    </div>

    <script>
        window.addEventListener('load', ()=>{

            const id = localStorage.getItem('id');

            const url = 'http://localhost/Gabriela/API/infobda/api/buscaId.php';
            fetch(url,
            {
                method: 'POST',
                body: JSON.stringify({'id': id})
            })
            .then(respostaJson => respostaJson.json())
            .then(respostaDados => {
                document.querySelector('#jogoEdit').value = respostaDados[0]['jogo'];
                document.querySelector('#notaEdit').value = respostaDados[0]['nota'];
                document.querySelector('#criticaEdit').value = respostaDados[0]['critica'];
                document.querySelector('#usuarioEdit').value = respostaDados[0]['usuario'];
            })
        });

        document.querySelector('#botao').addEventListener('click', () => {
        
            const url = 'http://localhost/Gabriela/API/infobda/api/editar.php';

            const id = localStorage.getItem('id');
            const jogo = document.querySelector('#jogoEdit').value;
            const nota = document.querySelector('#notaEdit').value;
            const critica = document.querySelector('#criticaEdit').value;
            const usuario = document.querySelector('#usuarioEdit').value;

            fetch(url,
            {
                method: 'POST',
                body: JSON.stringify
                ({
                    'id': id,
                    'jogo': jogo,
                    'nota': nota,
                    'critica': critica,
                    'usuario': usuario
                })
            })

        })
    </script>
</body>
</html>
