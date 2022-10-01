/**
 *  Contatos.
 */

const obterContatos = () => {
    
    const tbContatos = document.getElementById('tb-contatos')
    
    let html = ""

    fetch('/contato.php')
    .then (resp => resp.json())
    .then ( resp => {
        const json = JSON.parse(resp)
        console.log(json.data)

        json.data.forEach( (e) => {
            console.log(e.id)
            html += `<tr>
                        <td>${e.id}</td>
                        <td>${e.nome}</td>
                        <td>${e.email}</td>
                        <td>${e.assunto}</td>
                        <td>${e.mensagem}</td>
                    </tr>`
            
        })
    })
    .finally( ()  =>  tbContatos.innerHTML = html )
}

