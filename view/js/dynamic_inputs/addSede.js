//Constantes para el contenedor y el identificador de agregar
const contenedor = document.querySelector('#sedeDynamic');
const agregar = document.querySelector('#agregarSede');

//función listener para agregar elementos
agregar.addEventListener('click', e => {
    let td1 = document.createElement('div');
    td1.classList.add('row')
    td1.innerHTML ='<div class="col"> <input class="form-control text-container mt-2 addInput" type="text" name="sede" placeholder="Ingresa el nombre de la sede" required> </div><div class="col"><input class="form-control text-container mt-2 addInput" type="text" name="siglas" placeholder="Ingresa las siglas de la sede" required></div><button id="crearSede" type="button" class="btn btn-primary btn-tablaAdd">Crear Sede</button><button id="deleteSede" type="button" class="btn btn-danger btn-tablaAdd" onclick = "eliminar(this)">X</button>'

    contenedor.appendChild(td1);
    agregar.setAttribute("disabled", "")
});

/**
* Método para eliminar el elemento de input
* @param {this} e
*/

const eliminar = (e) => {
    const elementoTd = e.parentNode;
    contenedor.removeChild(elementoTd);
    agregar.removeAttribute("disabled")
}