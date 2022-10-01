"use strict";

var app = document.getElementById('app');
var ancora = document.querySelectorAll('a');
var relogio = document.getElementsByClassName('relogio-rodape')[0];
var faixa = document.getElementById('faixa-deslizante');
var divMsg = document.getElementById("msg"); //Referência para os botões de ação
// const btnRed = document.getElementById('btn-red')
// const btnYellow = document.getElementById('btn-yellow')
// const btnGreen = document.getElementById('btn-green')
// const btnBlue = document.getElementById('btn-blue')

var urlEnvioComando = 'https://loja.wmomodavix.site/api/comando';
var urlEstadoComando = 'https://loja.wmomodavix.site/api/status';
var contador = 0;
ancora.forEach(function (a) {
  a.addEventListener('click', function (evt) {
    evt.preventDefault();
    carregarPagina("".concat(evt.target.getAttribute('data-target'), ".html"));
    scrollTo(0, 0);
  });
});

var animaFaixa = function animaFaixa() {
  var width = 70;
  setInterval(function () {
    faixa.style.width = "".concat(Math.random() * width, "%");
  }, 100);
}; //chamada de página com callback opcional...


var carregarPagina = function carregarPagina(pagina) {
  divMsg.innerHTML = 'carregando página ...';
  fetch(pagina).then(function (resp) {
    return resp.text();
  }).then(function (resp) {
    app.innerHTML = resp;
    divMsg.innerHTML = 'Pronto!';
  });
  scrollTo(0, 0);
};
/**
 * Tocar um som
 * @params string path do som
 * 
 */


var tocarSom = function tocarSom(f) {
  var player = new Audio(f);
  player.play();
};

document.addEventListener("DOMContentLoaded", function () {
  setInterval(function () {
    var t = new Date();
    var hora = t.getHours().toString().padStart(2, '0');
    var minuto = t.getMinutes().toString().padStart(2, '0');
    var segundos = t.getSeconds().toString().padStart(2, '0');
    relogio.innerHTML = "".concat(hora, ":").concat(minuto, ":").concat(segundos);
  }, 1000);
  app.innerHTML = "Página dinamicamente carregada...";
  animaFaixa();
});

var processarEnvio = function processarEnvio() {
  divMsg.innerHTML = 'processando envio de mensagem ...';
  setTimeout(function () {
    document.getElementById('form-contato').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('dados do formulário capturado.');
      var constObjForm = new FormData();
      constObjForm.append("nome", e.target.nome.value);
      constObjForm.append("email", e.target.email.value);
      constObjForm.append("assunto", e.target.assunto.value);
      constObjForm.append("mensagem", e.target.mensagem.value);
      fetch('processarEnvio.php', {
        method: 'POST',
        body: constObjForm
      }).then(function (resp) {
        return resp.json();
      }).then(function (resp) {
        console.log(resp);
        document.getElementById('retorno').innerHTML = "\n                   <h2>Dados Recebidos do Servidor</h2>\n                   <strong>Nome:</strong>".concat(resp.nome, "<br>\n                   <strong>E-mail:</strong>").concat(resp.email, "<br>\n                   <strong>Assunto:</strong>").concat(resp.assunto, "<br>\n                   <strong>Mensagem:</strong>").concat(resp.mensagem, "<br>\n\n                ");
        e.target.nome.value = "";
        e.target.email.value = "";
        e.target.assunto.value = "";
        e.target.mensagem.value = "";
        divMsg.innerHTML = 'Pronto!';
      });
      return false;
    });
  }, 1000);
};

var processarLogin = function processarLogin() {
  divMsg.innerHTML = 'Processando login ...';
  setTimeout(function () {
    document.getElementById('form-login').addEventListener('submit', function (evt) {
      evt.preventDefault();
      divMsg.innerHTML = 'carregando recursos..';
      console.log(evt.target);
      var options = {
        headers: {
          'Content-Type': 'application/x-www-form'
        }
      };
      var formData = new FormData();
      formData.append('email', evt.target.email.value);
      formData.append('senha', evt.target.senha.value);
      fetch('/login.php', {
        method: "POST",
        body: JSON.stringify(formData),
        options: options
      }).then(function (resp) {
        return resp.json();
      }).then(function (resp) {
        divMsg.innerHTML = "recursos carregados...";
        console.log(resp);
      })["catch"](function (err) {
        return document.getElementById('retorno').innerHTML = err.message;
      });
    }, 1000);
  }); //return false;
};
/**
 * Enivar comando para a API
 * @param {*} comando 
 */


var enviarComando = function enviarComando(comando) {
  var btnClicked, btnClickedText, cmd;
  return regeneratorRuntime.async(function enviarComando$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          divMsg.innerHTML = 'enviando comando ...'; //pega a referência do botão clicado

          btnClicked = document.getElementById("btn-".concat(comando)); //pega o texto/html do botão no momento do click

          btnClickedText = btnClicked.innerHTML; //acrescenta o ícone spin para o botao

          btnClicked.innerHTML = "<i class=\"fa fa-spinner\"></i> processando ...";
          cmd = new FormData();
          cmd.append("comando", comando);
          _context.next = 8;
          return regeneratorRuntime.awrap(fetch(urlEnvioComando, {
            method: "POST",
            body: cmd
          }).then(function (resp) {
            return resp.json();
          }).then(function (resp) {
            return console.log(resp);
          })["catch"](function (err) {
            return console.log(err);
          })["finally"](function (r) {
            setTimeout(function () {
              estadoComando();
              divMsg.innerHTML = 'Pronto!';
              btnClicked.innerHTML = btnClickedText;
            }, 1000);
          }));

        case 8:
        case "end":
          return _context.stop();
      }
    }
  });
};
/**
 * Obter o último comando emitido
 * @param void
 */


var estadoComando = function estadoComando() {
  return regeneratorRuntime.async(function estadoComando$(_context2) {
    while (1) {
      switch (_context2.prev = _context2.next) {
        case 0:
          divMsg.innerHTML = 'obtendo status do comando..'; // for (var i=0; i <= 5; i++){

          _context2.next = 3;
          return regeneratorRuntime.awrap(fetch(urlEstadoComando).then(function (resp) {
            return resp.json();
          }).then(function (resp) {
            console.log(resp);
            document.getElementsByClassName('circle')[0].style.backgroundColor = resp.comando;
            divMsg.innerHTML = "Cor recebida: ".concat(resp.comando);

            if (resp.comando === 'yellow') {
              tocarSom('sons/som2.wav');
            }
          })["catch"](function (err) {
            return console.log(err);
          }));

        case 3:
        case "end":
          return _context2.stop();
      }
    }
  });
};

function sleep(milliseconds) {
  return new Promise(function (resolve) {
    return setTimeout(resolve, milliseconds);
  });
} // Cria um semáforo


var semaforo = function semaforo() {
  var comandos;
  return regeneratorRuntime.async(function semaforo$(_context3) {
    while (1) {
      switch (_context3.prev = _context3.next) {
        case 0:
          comandos = ['red', 'yellow', 'green', 'blue'];
          c = 0;

        case 2:
          if (!(c < comandos.length)) {
            _context3.next = 15;
            break;
          }

          _context3.next = 5;
          return regeneratorRuntime.awrap(enviarComando('black'));

        case 5:
          _context3.next = 7;
          return regeneratorRuntime.awrap(sleep(100));

        case 7:
          _context3.next = 9;
          return regeneratorRuntime.awrap(enviarComando(comandos[c]));

        case 9:
          divMsg.innerHTML = "Contador: ".concat(c + 1, " - Cor: ").concat(comandos[c]); // if ( comandos[c] == "yellow" ) { 
          //     tocarSom('sons/som2.wav') 
          // }

          _context3.next = 12;
          return regeneratorRuntime.awrap(sleep(5000));

        case 12:
          c++;
          _context3.next = 2;
          break;

        case 15:
          divMsg.innerHTML = 'Pronto!';

        case 16:
        case "end":
          return _context3.stop();
      }
    }
  });
};