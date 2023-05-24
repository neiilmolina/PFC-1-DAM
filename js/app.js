
let buscador = document.getElementsByClassName('buscador')[0];
let lupa = document.getElementById('lupa');
let logo = document.getElementsByClassName('logo')[0];

function ocultarBuscador(){
    let oculto = false
    if(oculto){
        buscador.setAttribute('type','text');
        logo.style.display = 'none';
        oculto = false
    } else{
        buscador.setAttribute('type','hidden');
        logo.style.display = 'block';
        oculto = false
    }
}

