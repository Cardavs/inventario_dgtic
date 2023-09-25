//Constantes para almacenar elementos input
const ISBN = document.getElementById('ISBN');
const Tiraje = document.getElementById('Tiraje');

//Constantes para almacenar el estado de los radio button
const inputISBN = document.getElementById('compilacion');
const inputTiraje = document.getElementById('auditoria');

//Función para mostrar el campo ISBN
function showISBN (){
    //Si el radio button de ISBN está activo despliega el input de ISBN y oculta el de tiraje
    if (inputISBN.value == 'checked') {
        ISBN.style.display = 'none';
        Tiraje.style.display = 'none';
    }
}

//Función para mostrar el campo de tiraje
function showTiraje (){
    //Si el radio button de Tiraje está activo despliega el input de Tiraje y oculta el de ISBN
    if (inputTiraje.value == 'checked') {
        Tiraje.style.display = 'block';
        ISBN.style.display = 'block';
    }
}