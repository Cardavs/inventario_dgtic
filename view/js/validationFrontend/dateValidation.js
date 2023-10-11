const buttonSearch = document.querySelector('#searchInput');
const contenedor = document.querySelector('#errorFecha');

buttonSearch.addEventListener('click', e =>{
    const fechaInicioInput = document.getElementById('finicio');
    const fechaFinInput = document.getElementById('ffin');
    
    var fecha1 = new Date(fechaInicioInput);
    var fecha2 = new Date(fechaFinInput);
    
    if (fecha1 < fecha2) {        
        console.log(fechaFinInput.value);
        let inputMessage = document.createElement('p');
        inputMessage.innerHTML = 'la fecha de inicio no puede ser mayor a la fecha final.';
        contenedor.appendChild(inputMessage);
    }
});