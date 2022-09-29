<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendendo a criar WEB Pages dinâmicas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/app.css">

    

</head>
<body>

<header class="fixed-top mb-4">
    <div class="jumbotron p-4 bg-primary text-white">
        <strong>App em PHP + HTML</strong><small>Wanderlei Silva do Carmo</small> 
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <div class="container-fluid text-white">
            <a class="navbar-brand" href="" data-target="inicio" >Logotipo aqui</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                   <a class="nav-link active" aria-current="page" href="#" data-target="inicio">  <i class="fas fa-home"></i> Inicio</a>
                </li>

                <li class="nav-item">
                   <a class="nav-link active" aria-current="page" href="#" data-target="login"  onclick="processarLogin();"><i class="fa fa-door-open fa-fw"></i> Entrar</a>
                </li>



                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" data-target="conteudo">Conteudo</a>
                </li>


                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" data-target="contato" onclick="processarEnvio();">Contato</a>
                </li>
                

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" data-target="sobre"><i class="fa fa-ask fa-fw"></i> Sobre</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

</header>

<main class="container py-1 border">
    <div id="app">
        <!-- o conteudo será injetado dinâmicamente pelo JavaScript -->

    </div>

    <div id="faixa-deslizante"></div>
</main>

<footer class="d-flex justify-content-between jumbroton bg-dark text-light mt-2 pt-1 px-2 px-2 pb-1 fixed-bottom ">

    <div class="self-start">
        Usuário: <span id="">Visitante|<small>wander.silva@gmail.com</small></span>
    </div>
    <div id="msg"> Mensagens do sistema...</div>
    <div class="self-end"><span class="relogio-rodape px-1 my-1"> 00:00:00 </span></div>

</footer>


<script src="js/app.js"></script>
    
</body>
</html>