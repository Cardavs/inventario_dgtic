function buscar() {
    // Obtener los valores de los campos de búsqueda
    const search = document.querySelector("#Busqueda").value;
    const files = document.querySelector("#numFilas").value;

    // Actualizar la variable userinfo
    window.$userInfo = new SelectUser().getUserName(search, files);
}