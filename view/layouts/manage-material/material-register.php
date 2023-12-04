<h2 class="titulo">Registrar Material</h2>
<form class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate enctype="multipart/form-data">
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="NombreMaterial">Nombre de material</label>
            <input name="NombreMaterial" class="form-control form-control-lg" type="text" placeholder="Nombre de material" required>
            <div class="invalid-feedback">
                Es necesario colocar un nombre.
            </div>
        </div>
        <div class="col p-3">
            <div class="form-check m-2">
                <input class="form-check-input" onclick="showTiraje();" type="radio" name="tipo" id="Autoría" value="Autoría">
                <label class="form-check-label" for="tipo">
                    Autoría
                </label>
            </div>
            <div class="form-check m-2">
                <input class="form-check-input" onclick="showISBN();" type="radio" name="tipo" id="compilacion" value="Compilación">
                <label class="form-check-label" for="tipo">
                    Compilación
                </label>
            </div>
        </div>
        <div class="col" id="ISBN">
            <label for="ISBN">ISBN</label>
            <input name="ISBN" id="ISBN-id" class="form-control form-control-lg" type="text" placeholder="ISBN">
            <div class="invalid-feedback">
                Es necesario colocar un ISBN
            </div>
        </div>
        <div class="col" id="Tiraje">
            <label for="Tiraje">Tiraje</label>
            <input name="Tiraje" id="Tiraje-id" class="form-control form-control-lg" type="number" placeholder="Tiraje" min="0">
            <div class="invalid-feedback">
                Es necesario colocar un Tiraje.
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="Autor">Autor</label>
            <input name="Autor" class="form-control form-control-lg" type="text" placeholder="Autor" required>
            <div class="invalid-feedback">
                Es necesario colocar un Autor.
            </div>
        </div>
        <div class="col">
            <label for="Versión">Versión</label>
            <input name="Versión" class="form-control form-control-lg" type="number" placeholder="Versión de material" min="0" required>
            <div class="invalid-feedback">
                Es necesario colocar una versión.
            </div>
        </div>
        <div class="col">
            <label for="AñoEdicion">Año de edición</label>
            <input name="AñoEdicion" class="form-control form-control-lg" type="number" placeholder="Año de edición" min="1960" max="2099" value="2023" required>
            <div class="invalid-feedback">
                Es necesario colocar un año de edición.
            </div>
        </div>
        <div class="col">
            <label for="NoPaginas">Número de páginas</label>
            <input name="NoPaginas" class="form-control form-control-lg" type="number" placeholder="Número de páginas" min="1" required>
            <div class="invalid-feedback">
                Es necesario colocar un número de páginas.
            </div>
        </div>

    </div>
    <div class="row g-9 mb-3">
        <div class="col">
            <label for="seccion">Sección del material</label>
            <select name="seccion" id="seccionSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option disabled default value="">Selecciona una opción</option>
                <?php foreach ($secciones as $seccion) { ?>
                    <option value="<?php echo $seccion['Seccion_Id'] ?>"><?php echo $seccion['SeccionNombre'] ?></option>
                <?php } ?>
            </select>
            <div class="invalid-feedback">
                Es necesario seleccionar una sección
            </div>
        </div>
        <div class="col">
            <label for="area">Área del material</label>
            <select name="area" id="areaSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option selected disabled default value="">Selecciona una opción</option>
                <?php foreach ($areas as $area) {
                    if ($area["Seccion_Id"] == 1) { ?>

                        <option value=<?php echo $area["Area_Id"] ?>><?php echo $area['AreaNombre'] ?></option>
                <?php }
                } ?>
            </select>
            <script>
                document.getElementById("seccionSelect").addEventListener("change", function() {
                    var seccionId = this.value;
                    var areaSelect = document.getElementById("areaSelect");

                    // Limpiar las opciones actuales en el segundo select
                    areaSelect.innerHTML = "";

                    // Llenar el segundo select con opciones basadas en la selección en el primero
                    var option = document.createElement("option");
                    option.text = "Selecciona una opcion"
                    option.value = "";
                    option.disabled = true;
                    areaSelect.appendChild(option);
                    <?php foreach ($areas as $area) : ?>
                        if (<?= $area['Seccion_Id'] ?> == seccionId) {
                            var option = document.createElement("option");
                            option.text = "<?= $area['AreaNombre'] ?>";
                            option.value = "<?= $area['Area_Id'] ?>";
                            areaSelect.appendChild(option);
                        }
                    <?php endforeach; ?>
                });
            </script>
            <div class="invalid-feedback">
                Es necesario seleccionar un área
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="subirMaterial" class="form-label">Subir material</label>
            <input name="material" class="form-control" type="file" id="subirMaterial" required>
            <div class="invalid-feedback">
                Es necesario subir un archivo.
            </div>
        </div>
        <div class="col">
            <label for="subirIndice" class="form-label">Subir índice</label>
            <input name="indice" class="form-control" type="file" id="subirIndice" required>
            <div class="invalid-feedback">
                Es necesario subir un archivo.
            </div>
        </div>
        <div class="col-md-12 text-center btn-pass">
            <label for="guardarMaterial"> </label>
            <input name="guardarMaterial" class="btn btn-primary botonCreateuser btn-tabla" type="submit" value="Guardar material">
            <label for="cancelar"> </label>
                <input name="cancelar" type="button" class="btn btn-primary botonCreateuser btn-tabla" value="Cancelar" onclick="cancelarFormularioM()">
        </div>
    </div>
</form>
<script src="/inventario_dgtic/view/js/dynamic_inputs/showHideInputs.js"></script>
<script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>