let div = document.getElementsByClassName('navegador')[0];
let inputTexto;
let busqueda = false
let mediaQuerieMovil = window.matchMedia("(max-width: 480px)");
let li = document.getElementsByTagName('li')
let ul = document.getElementsByTagName('ul')[0];
function mostrarBusqueda(){
    if(!busqueda){
        inputTexto = document.createElement('input');
        div.appendChild(inputTexto);
        busqueda = true;
    } else{
        div.removeChild(inputTexto);
        busqueda = false;
    }
}
