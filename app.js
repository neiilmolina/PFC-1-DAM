let div = document.getElementById('lupa')
let inputTexto;
let busqueda = false

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

