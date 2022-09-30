const app = document.getElementById('app')
const ancora = document.querySelectorAll('a')
const relogio = document.getElementsByClassName('relogio-rodape')[0]
const faixa = document.getElementById('faixa-deslizante')
let divMsg = document.getElementById("msg")

const urlEnvioComando  = 'https://loja.wmomodavix.site/api/comando'
const urlEstadoComando = 'https://loja.wmomodavix.site/api/status'

let contador = 0

ancora.forEach(a => {
    a.addEventListener('click', (evt) => {
        evt.preventDefault()

        carregarPagina(`${evt.target.getAttribute('data-target')}.html`)       
  
        scrollTo(0, 0)
    })
})

const animaFaixa = () => {
    let width = 70
    setInterval(() => {
            faixa.style.width = `${Math.random() * width}%`
        },
        100)
}

//chamada de página com callback opcional...
const carregarPagina = ( (pagina) => {
    divMsg.innerHTML = 'carregando página ...'
    fetch(pagina)
        .then(resp => resp.text())
        .then(resp => {
            app.innerHTML = resp
            divMsg.innerHTML = 'Pronto!'
        })

    scrollTo(0, 0)
})

document.addEventListener("DOMContentLoaded", () => {

    setInterval(() => {

        let t = new Date()

        let hora = t.getHours().toString().padStart(2, '0')
        let minuto = t.getMinutes().toString().padStart(2, '0')
        let segundos = t.getSeconds().toString().padStart(2, '0')

        relogio.innerHTML = `${hora}:${minuto}:${segundos}`

    }, 1000)

    app.innerHTML = "Página dinamicamente carregada..."

    animaFaixa()
})

const processarEnvio = () => {
    divMsg.innerHTML = 'processando envio de mensagem ...'
    setTimeout(() => {
        document.getElementById('form-contato').addEventListener('submit', (e) => {
            e.preventDefault()
            alert('dados do formulário capturado.')

            
             let constObjForm = new FormData()

             constObjForm.append("nome",e.target.nome.value)
             constObjForm.append("email",e.target.email.value)
             constObjForm.append("assunto",e.target.assunto.value)
             constObjForm.append("mensagem",e.target.mensagem.value)
             
             fetch('processarEnvio.php', {method:'POST', body:constObjForm})
             .then( resp => resp.json() )
             .then( resp => { 
                console.log(resp)

                document.getElementById('retorno').innerHTML = `
                   <h2>Dados Recebidos do Servidor</h2>
                   <strong>Nome:</strong>${resp.nome}<br>
                   <strong>E-mail:</strong>${resp.email}<br>
                   <strong>Assunto:</strong>${resp.assunto}<br>
                   <strong>Mensagem:</strong>${resp.mensagem}<br>

                `

                e.target.nome.value = ""
                e.target.email.value = ""
                e.target.assunto.value = ""
                e.target.mensagem.value = ""

                divMsg.innerHTML = 'Pronto!'

             })             
             return false;
        })
    }, 1000)
    
}


const processarLogin = () => {
    divMsg.innerHTML = 'Processando login ...'
    setTimeout(() => {
 
           document.getElementById('form-login').addEventListener('submit', (evt)=>{
    
            evt.preventDefault()

            divMsg.innerHTML = 'carregando recursos..'
            console.log(evt.target)

            const options =  { 
                 headers: {'Content-Type': 'application/x-www-form'}
            }

            const formData = new FormData()
            formData.append('email', evt.target.email.value)
            formData.append('senha', evt.target.senha.value)
    
            fetch('/login.php', { method: "POST", body: JSON.stringify(formData), options})
            .then( resp => resp.json())
            .then( resp => { divMsg.innerHTML = "recursos carregados..."; console.log(resp)})
            .catch( err => document.getElementById('retorno').innerHTML = err.message)
             
        }, 1000)

    } )

    //return false;

}

/**
 * Enivar comando para a API
 * @param {*} comando 
 */
const  enviarComando = async ( comando )  =>  {
    divMsg.innerHTML = 'enviando comando ...'
    let cmd = new FormData();
    cmd.append("comando",comando)

    await fetch(urlEnvioComando, { method: "POST", body: cmd  })   
    .then( resp => resp.json())
    .then(resp => console.log(resp))
    .catch(err => console.log(err))
    .finally( (r) => { 
        setTimeout( () => {
            estadoComando()
            divMsg.innerHTML = 'Pronto!'
        }, 1000)
     })

}
/**
 * Obter o último comando emitido
 * @param void
 */
const estadoComando = async() => {
    divMsg.innerHTML = 'obtendo status do comando..'
    // for (var i=0; i <= 5; i++){
    
        await 
            fetch(urlEstadoComando)
            .then(resp => resp.json())
            .then( resp => {
                console.log(resp)
                document.getElementsByClassName('circle')[0].style.backgroundColor = resp.comando
                divMsg.innerHTML = `Cor recebida: ${resp.comando}`
            })
            .catch( err => console.log(err))       

    // }
}

function sleep(milliseconds) {
    return new Promise(resolve => setTimeout(resolve, milliseconds))
}

// Cria um semáforo
const semaforo = async() => {

  let comandos = [
    'red', 
    'yellow',
    'green',
    'blue',
]

  const tocarSom  = ( f ) => {

    const player = new Audio(f);
    player.play()

  }
 
   for( c=0; c < comandos.length; c++ ) {    
        await enviarComando('black')
        await sleep(100)
        await enviarComando(comandos[c])
        divMsg.innerHTML = `Contador: ${c +1} - Cor: ${comandos[c]}`
        if ( comandos[c] == "yellow" ) { 
            tocarSom('sons/som2.wav') 
        }
        await sleep(5000) 
    }
    
    divMsg.innerHTML = 'Pronto!'
}