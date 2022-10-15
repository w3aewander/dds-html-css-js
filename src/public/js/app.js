const app = document.getElementById('app')
const ancora = document.querySelectorAll('a')
const relogio = document.getElementsByClassName('relogio-rodape')[0]
const faixa = document.getElementById('faixa-deslizante')
let divMsg = document.getElementById("msg")

//Referência para os botões de ação
const btnRed = document.getElementById('btn-red')
const btnYellow = document.getElementById('btn-yellow')
const btnGreen = document.getElementById('btn-green')
const btnBlue = document.getElementById('btn-blue')
const btnBlack = document.getElementById('btn-black')
const btnSemaforo = document.getElementById('btn-semaforo')

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

/**
 * Tocar um som
 * @params string path do som
 * 
 */
const tocarSom  = ( f ) => {
    const player = new Audio(f);
    player.play()
}

//Muda o texto do botão para o ícone do spinner..
const showSpinner = (comando) => {
    //pega a referência do botão clicado
    let btnClicked = document.getElementById(`btn-${comando}`)
        
    //pega o texto/html do botão no momento do click
    let btnClickedText = btnClicked.innerHTML

    //acrescenta o ícone spin para o botao
    btnClicked.innerHTML = `<i class="fa fa-spinner"></i> processando ${comando}...`  

}


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
            // alert('dados do formulário capturado.')
           
            //console.log(this.id.value)

             let constObjForm = new FormData()

             constObjForm.append("id", this.id.value)
             constObjForm.append("nome",this.nome.value)
             constObjForm.append("email",this.email.value)
             constObjForm.append("assunto",this.assunto.value)
             constObjForm.append("mensagem",this.mensagem.value)
             
            //  fetch('contato.php', {method:'POST', body:constObjForm})
            //  .then( resp => resp.json() )
            //  .then( resp => { 
            //     console.log(resp)

                console.log(constObjForm)

                salvarContato(constObjForm)

                // document.getElementById('retorno').innerHTML = `
                //    <h2>Dados Recebidos do Servidor</h2>
                //    <strong>Nome:</strong>${resp.nome}<br>
                //    <strong>E-mail:</strong>${resp.email}<br>
                //    <strong>Assunto:</strong>${resp.assunto}<br>
                //    <strong>Mensagem:</strong>${resp.mensagem}<br>
                //`

                this.nome.value = ""
                this.email.value = ""
                this.assunto.value = ""
                this.mensagem.value = ""

                divMsg.innerHTML = 'Pronto!'

            //  })             
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
const enviarComando = async ( comando )  =>  {
    divMsg.innerHTML = 'enviando comando ...'

    let cmd = new FormData();
    cmd.append("comando",comando)

    //exibir spinner no botão clicado
    showSpinner(comando)

    await fetch(urlEnvioComando, { method: "POST", body: cmd  })   
    .then( resp => resp.json())
    .then(resp => { console.log(resp)})
    .catch(err => console.log(err))
    .finally( (r) => { 
        setTimeout( () => {            
            estadoComando()     
            divMsg.innerHTML = 'Pronto!'
            document.getElementById(`btn-${comando}`).innerHTML = `Ligar ${comando}` 
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
                if ( resp.comando === 'yellow'){
                    tocarSom('sons/som2.wav')
                }
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
  //exibir o spinner  
  showSpinner('semaforo')
   
   for( c=0; c < comandos.length; c++ ) {    
        await enviarComando('black')
        await sleep(100)
        await enviarComando(comandos[c])
        divMsg.innerHTML = `Contador: ${c +1} - Cor: ${comandos[c]}`
        // if ( comandos[c] == "yellow" ) { 
        //     tocarSom('sons/som2.wav') 
        // }
        //documentElement.getElementById(`btn-${comandos[c]}`).innerHTML = `Ligar ${comandos[c]}`
        await sleep(5000) 
    }
    
    document.getElementById('btn-semaforo').innerHTML = `Ligar Semáforo`
    divMsg.innerHTML = 'Pronto!'
}