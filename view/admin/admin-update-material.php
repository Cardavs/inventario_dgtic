<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include_once(CONNECTION_BD);


include(BD_UPDATE . 'update-material.php');
include(BD_SELECT . 'select-material.php');
include(BD_SELECT . 'select-section.php');
include(BD_SELECT . 'select-area.php');

//Obtieniendo Id del usuario para mostrar datos.
$id = $_GET['id'];

//Instanciando clase para obtener datos del usuario.
$datosMaterial = new SelectMaterials();
$datosSeccion = new SelectSection();
$datosArea = new SelectAreas();

//Llamando a la funcion para realizar el select del usuario a editar
$materialInfo = $datosMaterial->getMaterialById($id);
$secciones = $datosSeccion->getSection();
$areas = $datosArea->getAreas();
?>
<!DOCTYPE html>
<html lang="es">
<?php
include(LAYOUT . '/head.php');
?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <h2 class="titulo">Gestionar Material</h2>
    <form action="/inventario_dgtic\controllers\validation\php\validate-UpdateMaterial.php" method="post" class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate enctype="multipart/form-data">
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="nombreMaterial">Nombre de material</label>
                <input name="nombreMaterial" class="form-control form-control-lg" type="text" placeholder="Nombre de material" value="<?php echo $materialInfo['MaterialNombre'] ?>" required>
                <div class="invalid-feedback">
                    Es necesario colocar un nombre.
                </div>
            </div>
            <div class="col p-3">
                <div class="form-check m-2">
                    <input class="form-check-input" onclick="showTiraje();" type="radio" name="tipo" id="auditoria" value="Auditoría" <?php if (!is_null($materialInfo['MaterialISBN'])) echo "checked"; ?>>
                    <label class="form-check-label" for="tipo">
                        Auditoría
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" onclick="showISBN();" type="radio" name="tipo" id="compilacion" value="Compilación" <?php if (is_null($materialInfo['MaterialISBN'])) echo "checked"; ?>>
                    <label class="form-check-label" for="tipo">
                        Compilación
                    </label>
                </div>
            </div>
            <div class="col" id="ISBN" <?php if (!is_null($materialInfo['MaterialISBN'])) echo 'style="display: block;"'; ?>>
                <label for="ISBN">ISBN</label>
                <input name="ISBN" id="ISBN-id" class="form-control form-control-lg" type="text" placeholder="ISBN" value="<?php echo $materialInfo['MaterialISBN'] ?>">
                <div class="invalid-feedback">
                    Es necesario colocar un ISBN
                </div>
            </div>
            <div class="col" id="Tiraje" <?php if (!is_null($materialInfo['MaterialISBN'])) echo 'style="display: block;"'; ?>>
                <label for="Tiraje">Tiraje</label>
                <input name="Tiraje" id="Tiraje-id" class="form-control form-control-lg" type="number" placeholder="Tiraje" min="0" value="<?php echo $materialInfo['MaterialTiraje'] ?>">
                <div class="invalid-feedback">
                    Es necesario colocar un Tiraje.
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="autor">Autor</label>
                <input name="autor" class="form-control form-control-lg" type="text" placeholder="Autor" required value="<?php echo $materialInfo['MaterialAutor'] ?>">
                <div class="invalid-feedback">
                    Es necesario colocar un Autor.
                </div>
            </div>
            <div class="col">
                <label for="version">Versión</label>
                <input name="version" class="form-control form-control-lg" type="number" placeholder="Versión de material" min="0" value="<?php echo $materialInfo['MaterialVersion'] ?>" required>
                <div class="invalid-feedback">
                    Es necesario colocar una versión.
                </div>
            </div>
            <div class="col">
                <label for="anioEdicion">Año de edición</label>
                <input name="anioEdicion" class="form-control form-control-lg" type="number" placeholder="Año de edición" min="1960" max="2099" value="<?php echo $materialInfo['MaterialEdicion'] ?>" required>
                <div class="invalid-feedback">
                    Es necesario colocar un año de edición.
                </div>
            </div>
            <div class="col">
                <label for="noPaginas">Número de páginas</label>
                <input name="noPaginas" class="form-control form-control-lg" type="number" placeholder="Número de páginas" value="<?php echo $materialInfo['MaterialPaginas'] ?>" min="1" required>
                <div class="invalid-feedback">
                    Es necesario colocar un número de páginas.
                </div>
            </div>

        </div>
        <div class="row g-9 mb-3">
            <div class="col">
                <label for="seccion">Sección del material</label>
                <select name="seccion" id="seccionSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option disabled default value="">Selecciona una opción</option>
                    <?php foreach ($secciones as $seccion) { ?>
                        <option value="<?php echo $seccion['Seccion_Id'] ?>" <?php echo ($seccion['Seccion_Id'] == $materialInfo['Seccion_Id']) ? "selected" : "" ?>><?php echo $seccion['SeccionNombre'] ?></option>
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    Es necesario seleccionar una sección
                </div>
            </div>
            <div class="col">
                <label for="area">Área del material</label>
                <select name="area" id="areaSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected disabled default value="">Selecciona una opción</option>
                    <?php foreach ($areas as $area) { 
                        if($area["Seccion_Id"] == $materialInfo["Seccion_Id"]){?>

                        <option value=<?php echo $area["Area_Id"] ?> <?php echo ($area['Area_Id'] == $materialInfo['Area_Id']) ? "selected" : "" ?>><?php echo $area['AreaNombre'] ?></option>
                    <?php }} ?>
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
                                option.value = "<?= $area['Area_Id']?>";
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
                <input name="material" class="form-control" type="file" id="subirMaterial">
                <div class="invalid-feedback">
                    Es necesario subir el archivo del Material.
                </div>
            </div>
            <div class="col">
                <label for="subirIndice" class="form-label">Subir índice</label>
                <input name="indice" class="form-control" type="file" id="subirIndice">
                <div class="invalid-feedback">
                    Es necesario subir el archivo del Indice.
                </div>
            </div>
            <div>
                <input type="text" hidden name="idMaterial" value="<?php echo $materialInfo['Material_Id'] ?>">
            </div>
            <div class="col-md-12 text-center">
                <label for="actualizar"> </label>
                <input name="actualizar" class="btn btn-primary botonCreateuser" type="submit" value="Actualizar">
            </div>

            <div class="col-md-12 text-center">
                <label for="cancelar"> </label>
                <input name="cancelar" type="submit" class="btn btn-primary botonCreateuser" value="Cancelar">
            </div>
        </div>
    </form>
    <script src="/inventario_dgtic/view/js/dynamic_inputs/showHideInputs.js"></script>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>