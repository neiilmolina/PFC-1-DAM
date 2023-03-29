let formularios = document.forms;

let inicioSesion = formularios[0];

let input = document.getElementsByTagName('input')

let span = document.getElementsByTagName('span');

let div = document.getElementsByTagName('div')[0];

/**
 * @description Función que valida la contraseña con un regex
 * @param NO
 * @returns NO
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
}
/**
 * @description Función que valida el email con un regex
 * @param NO
 * @returns String
 */
function validarEmail(){
    let valor = inicioSesion['elements'][0]['value'];
    let expresion=  /^\w+@[a-zA-z]+[.][a-zA-z]+$/;
    
    if(expresion.test(valor)){
        console.log('correcto')
        input[0].classList.remove('inicio');
        input[0].classList.add('correcto');
        span[0].textContent = 'Correcto'
        span[0].style.color = 'green'
    } else{
        console.log('Incompleto');
        input[0].classList.remove('inicio');
        input[0].classList.add('incorrecto');
        span[0].textContent = 'Incorrecto'
        span[0].style.color = 'red'
    }
}

function validar(){
    validarEmail();
    validarContraseña();
}