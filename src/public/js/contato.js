/**
 * 
 * Carrega os dados que já estão visualizados na linha da tabela
 * e popula os dados dos elementos inputs do formulário
 * evitando assim que nova requisição seja enviada para o servidor
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

const popularForm = (elem) => {
  // pega os dados do elemento pai
  const ct = elem.parentNode.parentNode

  // popula os inputs do formulário
  document.getElementById("form-contato").id.value = ct.getAttribute('data-id')
  document.getElementById("form-contato").nome.value = ct.getAttribute('data-nome')
  document.getElementById("form-contato").email.value = ct.getAttribute('data-email')
  document.getElementById("form-contato").assunto.value = ct.getAttribute('data-assunto')
  document.getElementById("form-contato").mensagem.value = ct.getAttribute('data-mensagem')
  
}

const obterContatos = () => {
    
    const tbContatos = document.getElementById('tb-contatos')
    
    let html = ""

    fetch('contato.php')
    .then (resp => resp.json())
    .then ( resp => {
        //const json = JSON.parse(resp)
        console.log(resp.data)

        resp.data.forEach( (e) => {
            console.log(e)
            html += `<tr data-id="${e.id}" data-nome="${e.nome}" 
                         data-email="${e.email}" data-assunto="${e.assunto}" 
                         data-mensagem="${e.mensagem}">

                        <td>${e.id}</td>
                        <!-- <td>${e.nome}</td> -->
                        <td>${e.email}</td>
                        <!-- <td>${e.assunto}</td> -->
                        <!-- <td>${e.mensagem}</td> -->
                        <td>
                           <button type="button" onclick="popularForm(this);"   class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                           <button type="button" onclick="excluirContato(${e.id})" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>`           
        })
    })
    .finally( ()  =>  tbContatos.innerHTML = html )
}


const salvarContato = async (e) => {

    const id =       document.getElementById('id').value;
    const nome =     document.getElementById('nome').value;
    const assunto =  document.getElementById('assunto').value;
    const email =    document.getElementById('email').value;
    const mensagem = document.getElementById('mensagem').value;

    
    let formContato = new FormData();
    formContato.append('id', id);
    formContato.append('nome',nome);
    formContato.append('assunto', assunto)
    formContato.append('email', email);
    formContato.append('mensagem', mensagem);
    
    let salvar = undefined
    
    //console.log(formContato.toString())
    if ( id > 0 ){
        fetch('contato.php', {
                               mode: 'cors',
                               method: 'PUT', 
                               body: new URLSearchParams(formContato), 
                               headers: { 'Content-Type': 'application/x-www-form-urlencoded'} 
        })
         .then(resp => resp.json())
         .then(resp => { console.log(resp);obterContatos() })
         .catch(err => console.log(err))
                            
        console.log('atualizando...');

    } else {
       fetch('contato.php', {
            mode: 'cors',
            method: 'POST', 
            body: new URLSearchParams(formContato), 
            headers: { 'Content-Type': 'application/x-www-form-urlencoded'} 
         })
         .then(resp => resp.json())
         .then(resp => {console.log(resp); obterContatos()})
         .catch(err => console.log(err))

         
         console.log('incluindo novo...')
        }
    }

const excluirContato = (id) => {
    
    let formContato = new FormData();
    formContato.append('id', id);
    
    let salvar = undefined
    
    fetch(`contato.php?id=${id}`, {
        mode: 'cors',
        method: 'DELETE', 
        //body: new URLSearchParams(formContato), 
        //headers: { 'Content-Type': 'application/x-www-form-urlencoded'} 
     })
     .then(resp => resp.json())
     .then(resp => {console.log(resp); obterContatos()})
     .catch(err => console.log(err))

     
     console.log('excluindo o registro...')
}
    
    