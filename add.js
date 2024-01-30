var add = document.querySelector("#add");

add.addEventListener('click', () => {

    let jogo = document.querySelector('#jogo').value;
    let nota = document.querySelector('#nota').value;
    let critica = document.querySelector('#critica').value;
    let usuario = document.querySelector('#usuario').value;

    let url = 'http://localhost/Gabriela/API/infobda/api/insert.php';

    fetch(url,{
        method : "POST",
        body : JSON.stringify({
          'jogo' : jogo,
          'nota' : nota,
          'critica' : critica,
          'usuario' : usuario
        })
      })
         
    .then( (respostaJson) => {
        return respostaJson.json();
    })
});