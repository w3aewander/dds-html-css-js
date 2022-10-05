/**
 *  Contatos.
 */

const popularForm = (elem) => {
  const ct = elem.parentNode.parentNode
  console.log(ct.getAttribute('data-nome'))
}

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
            html += `<tr data-id="${e.id}" data-nome="${e.nome}" 
                         data-email="${e.email}" data-assunto="${e.assunto}" 
                         data-mensagem="${e.mensagem}">

                        <td>${e.id}</td>
                        <td>${e.nome}</td>
                        <td>${e.email}</td>
                        <td>${e.assunto}</td>
                        <td>${e.mensagem}</td>
                        <td>
                           <button type="button" onclick="popularForm(this);"   class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                           <button type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>`
            
        })
    })
    .finally( ()  =>  tbContatos.innerHTML = html )
}

