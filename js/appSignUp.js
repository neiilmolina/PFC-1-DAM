let formularios = document.forms;

let inicioSesion = formularios[0];

let input = document.getElementsByTagName('input')

let span = document.getElementsByTagName('span');

let div = document.getElementsByTagName('div')[0];

let button = document.getElementsByTagName('button')[0];

/**
 * @description Función que valida la contraseña con un regex
 * @param NO
 * @returns String
 */
function validarContraseña(){
    let valor = inicioSesion['elements'][1]['value'];
    /**
     * La contraseña debe tener:
     * -    un minimo de 7 caracteres   ----> .{7,}
     * -    una mayuscula               ----> [A-Z]
     * -    dos digitos                 ----> \d{2}
     * -    minusculas                  ----> [a-z]
     * -    un carácter . - _ , =       ----> [. - _ , =]
     */
    let expresion= /(?=.*\d{2}).{7,}/;
    
    if(expresion.test(valor)){
        input[1].classList.remove('inicio');
        input[1].classList.remove('incorrecto');
        input[1].classList.add('correcto');
        span[1].textContent = 'Correcto'
        span[1].style.color = 'green'
    }else{
        console.log('Incompleto');
        input[1].classList.remove('inicio');
        input[1].classList.remove('correcto');
        input[1].classList.add('incorrecto');
        span[1].textContent = 'Incorrecto'
        span[1].style.color = 'red'
    }

    return valor;
}
/**
 * @description Función que valida confirma si la contraseña es igual o no en
 * la función validarContraseña()
 * @param NO
 * @returns NO
 */
function confirmarContraseña(){
    let valor = inicioSesion['elements'][3]['value'];
    let contraseña = validarContraseña();
    let verificar =false;
    /**
     * La contraseña debe tener:
     * -    un minimo de 7 caracteres   ----> .{7,}
     * -    una mayuscula               ----> [A-Z]
     * -    dos digitos                 ----> \d{2}
     * -    minusculas                  ----> [a-z]
     * -    un carácter . - _ , =       ----> [. - _ , =]
     */
    let expresion= /(?=.*\d{2}).{7,}/;
    
    if(expresion.test(valor)){
        if(contraseña === valor){
            input[3].classList.remove('inicio');
            input[3].classList.remove('incorrecto');
            input[3].classList.add('correcto');
            span[2].textContent = 'Contraseña Válida'
            span[2].style.color = 'green'
            verificar = true;
        } else{
            input[3].classList.remove('inicio');
            input[3].classList.remove('correcto');
            input[3].classList.add('incorrecto');
            span[2].textContent = 'No es la misma contraseña'
            span[2].style.color = 'red'

        }
    }else{
        input[3].classList.remove('inicio');
        input[3].classList.remove('correcto');
        input[3].classList.add('incorrecto');
        span[2].textContent = 'Incorrecto'
        span[2].style.color = 'red'
    }

    return verificar
}
/**
 * @description Función que valida el email con un regex
 * @param NO
 * @returns NO
 */
function validarEmail(){
    let valor = inicioSesion['elements'][0]['value'];
    let expresion=  /^\w+@[a-zA-z]+[.][a-zA-z]+$/;
    let verificar = false;
    if(expresion.test(valor)){
        input[0].classList.remove('inicio');
        input[0].classList.remove('incorrecto');
        input[0].classList.add('correcto');
        span[0].textContent = 'Correcto'
        span[0].style.color = 'green'
        verificar = true;
    } else{
        input[0].classList.remove('inicio');
        input[0].classList.remove('correcto');
        input[0].classList.add('incorrecto');
        span[0].textContent = 'Incorrecto'
        span[0].style.color = 'red'
    }

    
    return verificar;
    
}

/**
 * @description Función que recoge todas las validaciones 
 * @param NO
 * @returns NO
 */
function activarBoton(){
    if(validarEmail() && confirmarContraseña()){
        button.disabled= false;
        button.addEventListener("mouseover", function() {
            button.style.backgroundColor = "#b6d420";
            button.style.color="black"
            button.style.cursor="pointer"
          });
          
            button.addEventListener("mouseout", function() {
                button.style.backgroundColor = "black";
                button.style.color="white"
            button.style.cursor="default"
          });
    } else{
        button.disabled = true;
        button.style.backgroundColor = "grey";
    }
}

function validar(){
    validarEmail();
    validarContraseña();
    confirmarContraseña();
    activarBoton();
}