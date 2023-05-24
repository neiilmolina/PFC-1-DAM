let corazon = document.getElementsByClassName('favoritos')[0];
let favorito = false;

function cambiarCorazon(){
    if(favorito){
        corazon.style.color = 'black'
        favorito = false;
    } else{
        corazon.style.color = 'red'
        favorito = true;
    }
}