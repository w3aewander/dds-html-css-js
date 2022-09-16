const app = document.getElementById('app')
const ancora = document.querySelectorAll('a')

ancora.forEach( a => {
    a.addEventListener('click', (evt) =>{
         evt.preventDefault()
       
         const  pagina = evt.target.getAttribute('data-target') + ".html"

         console.log(pagina)

         fetch(pagina)
         .then(resp => resp.text())
         .then( resp => app.innerHTML = resp)

    })
})

document.addEventListener("DOMContentLoaded", () => {


    

    app.innerHTML = "Página dinamicamente carregada..."

})