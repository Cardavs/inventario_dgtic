//Constantes para almacenar elementos input
const ISBN = document.getElementById('ISBN');
const Tiraje = document.getElementById('Tiraje');
const ISBNInput = document.getElementById('ISBN-id');
const TirajeInput = document.getElementById('Tiraje-id');

//Constantes para almacenar el estado de los radio button
const inputISBN = document.getElementById('compilacion');
const inputTiraje = document.getElementById('Autoría');

//Función para mostrar el campo ISBN
function showISBN (){
    //Si el radio button de ISBN está activo despliega el input de ISBN y oculta el de tiraje
    if (inputISBN.checked) {
        ISBN.style.display = 'none';
        ISBNInput.required = false;
        Tiraje.style.display = 'none';
        TirajeInput.required = false;
    }
}

//Función para mostrar el campo de tiraje
function showTiraje (){
    //Si el radio button de Tiraje está activo despliega el input de Tiraje y oculta el de ISBN
    if (inputTiraje.checked) {
        Tiraje.style.display = 'block';
        TirajeInput.required = true;
        ISBN.style.display = 'block';
        ISBNInput.required = true;
    }
}