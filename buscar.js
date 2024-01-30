var campo_nome = document.querySelector('#buscar');

campo_nome.addEventListener('keyup', () => {

    const valor = campo_nome.value;
    const url = 'http://localhost/Gabriela/API/infobda/api/buscar.php';

    fetch(url,
    {
        method : 'POST',
        body : JSON.stringify({
            'buscar' : valor
        })
    }
    )
    .then( respostaJson => { return respostaJson.json() })
    .then ( respostaDado => {

        document.querySelector('#resultado').innerHTML = '';

        let tag_ul = document.createElement('ul');

        respostaDado.forEach(elemento => {

            let tag_li = document.createElement('li');
            tag_li.textContent = elemento['jogo'];

            tag_ul.appendChild(tag_li);
        });

        document.querySelector('#resultado').appendChild(tag_ul);

    })
    .catch( erro => {
        console.log(erro.message);
    });



});