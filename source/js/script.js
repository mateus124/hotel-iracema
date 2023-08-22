const hamburguer = document.querySelector('.hamburguer');
const navMenu = document.querySelector('.navigation');

hamburguer.addEventListener('click', () => {
    hamburguer.classList.toggle('active');
    navMenu.classList.toggle('active');
})

function editcss(imagem) {
    section = document.querySelector('.section1')
    section.style.background = `linear-gradient(rgba(0,0,0,0.48), rgba(0,0,0,0.48)), url('${imagem}')`
    section.style.backgroundSize = 'cover'
    section.style.backgroundPosition = 'center bottom'
    section.style.backgroundAttachment = 'fixed'
}

function trocarimg0() {
    img = 'source/img/hotel.webp';
    editcss(img)

    document.querySelector('#btn1').classList.add('active')
    document.querySelector('#btn2').classList.remove('active')
    document.querySelector('#btn3').classList.remove('active')
}

function trocarimg1() {
    img = 'source/img/carr.jpg';
    editcss(img)

    document.querySelector('#btn1').classList.remove('active')
    document.querySelector('#btn2').classList.add('active')
    document.querySelector('#btn3').classList.remove('active')
}

function trocarimg2() {
    img = 'source/img/carr2.jpg';
    editcss(img)

    document.querySelector('#btn1').classList.remove('active')
    document.querySelector('#btn2').classList.remove('active')
    document.querySelector('#btn3').classList.add('active')
}

function mostrar() {
    document.querySelector('#outros1').classList.toggle('escondido')
    document.querySelector('#outros2').classList.toggle('escondido')
    document.querySelector('#outros3').classList.toggle('escondido')

    var x = document.getElementById("botaover");

    if (x.innerHTML === "VER MAIS") {
        x.innerHTML = "VER MENOS";
    } else {
        x.innerHTML = "VER MAIS";
    }
}

document.getElementById('olho').addEventListener('mousedown', function() {
    document.getElementById('pass').type = 'text';
  });
  
  document.getElementById('olho').addEventListener('mouseup', function() {
    document.getElementById('pass').type = 'password';
  });
  
  // Para que o password não fique exposto apos mover a imagem.
  document.getElementById('olho').addEventListener('mousemove', function() {
    document.getElementById('pass').type = 'password';
  });