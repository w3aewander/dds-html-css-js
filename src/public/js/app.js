const app = document.getElementById('app')
const ancora = document.querySelectorAll('a')
const relogio = document.getElementsByClassName('relogio-rodape')[0]
const faixa  = document.getElementById('faixa-deslizante')


const animaFaixa = () => {
    let width = 90

    setInterval( () => {
          faixa.style.width  =  `${Math.random() * width}%`     
    }, 150)
}


ancora.forEach( a => {
    a.addEventListener('click', (evt) =>{
         evt.preventDefault()
       
         const  pagina = evt.target.getAttribute('data-target') + ".html"

         fetch(pagina)
         .then(resp => resp.text())
         .then( resp => app.innerHTML = resp)

         scrollTo(0,0)

    })
})

document.addEventListener("DOMContentLoaded", () => {

    setInterval( ()=>{
    
        let t = new Date()
    
        let hora = t.getHours().toString().padStart(2,'0')
        let minuto = t.getMinutes().toString().padStart(2,'0')
        let segundos = t.getSeconds().toString().padStart(2,'0')
          
        relogio.innerHTML = `${hora}:${minuto}:${segundos}`

    }, 1000)

    app.innerHTML = "Página dinamicamente carregada..."

    animaFaixa();
})


