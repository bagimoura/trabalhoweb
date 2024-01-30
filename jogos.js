var showtable = document.querySelector("#showtable");

showtable.addEventListener('click', () => {
    fetch ('http://localhost/Gabriela/API/infobda/api/show.php')

    .then((res) => {
        return res.json();
    })
    .then((dados) => {
        //document.querySelector('#res').innerHTML = dados;

        var tabela = document.querySelector('#tabela');
        tabela.innerHTML = '';

        //console.log(dados['jogo'][0]);
        //console.log(dados['jogo'].length);

        for(let i = 0; i < dados['jogo'].length; i++)
        {

            var tr = document.createElement('tr');

            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');
            var td6 = document.createElement('td');

            var td_text1 = document.createTextNode(dados['jogo'][i]);
            var td_text2 = document.createTextNode(dados['nota'][i]);
            var td_text3 = document.createTextNode(dados['critica'][i]);
            var td_text4 = document.createTextNode(dados['usuario'][i]);

            var excluir = document.createElement('a');
            excluir.setAttribute('data-id', dados['id'][i]);
            excluir.innerText = 'Excluir';
            excluir.href = "#";
            excluir.addEventListener('click', () => {
                const url = 'http://localhost/Gabriela/API/infobda/api/excluir.php';
                fetch(url,{
                    method: 'POST',
                    body: JSON.stringify({'id': dados['id'][i]})
                })
            });

            var editar = document.createElement('a');
            editar.setAttribute('data-id', dados['id'][i]);
            editar.innerText = 'Editar';
            editar.href='http://localhost/Gabriela/API/infobda/api/form_editar.php';
            editar.addEventListener('click', () => {
                localStorage.setItem('id', dados['id'][i]);
            });

            td1.appendChild(td_text1);
            td2.appendChild(td_text2);
            td3.appendChild(td_text3);
            td4.appendChild(td_text4);
            td5.appendChild(excluir);
            td6.appendChild(editar);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            
            tabela.appendChild(tr);
        }
    })

});