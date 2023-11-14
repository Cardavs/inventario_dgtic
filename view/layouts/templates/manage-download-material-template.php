<form action="/inventario_dgtic\controllers\validation\php\validate-UpdateMaterial.php" class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate enctype="multipart/form-data">
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="nombreMaterial">Nombre de material</label>
            <input name="nombreMaterial" class="form-control form-control-lg" type="text" placeholder="Nombre de material" value="<?php echo $materialInfo['MaterialNombre'] ?>" readonly>
        </div>
        <div class="col p-3">
            <div class="form-check m-2">
                <input class="form-check-input" onclick="showTiraje();" type="radio" name="tipo" id="auditoria" value="Auditoría" <?php if (!is_null($materialInfo['MaterialISBN'])) echo "checked"; ?> disabled>
                <label class="form-check-label" for="tipo">
                    Auditoría
                </label>
            </div>
            <div class="form-check m-2">
                <input class="form-check-input" onclick="showISBN();" type="radio" name="tipo" id="compilacion" value="Compilación" <?php if (is_null($materialInfo['MaterialISBN'])) echo "checked"; ?> disabled>
                <label class="form-check-label" for="tipo">
                    Compilación
                </label>
            </div>
        </div>
        <div class="col" id="ISBN" <?php if (!is_null($materialInfo['MaterialISBN'])) echo 'style="display: block;"'; ?>>
            <label for="ISBN">ISBN</label>
            <input name="ISBN" id="ISBN-id" class="form-control form-control-lg" type="text" placeholder="ISBN" value="<?php echo $materialInfo['MaterialISBN'] ?>" readonly>

        </div>
        <div class="col" id="Tiraje" <?php if (!is_null($materialInfo['MaterialISBN'])) echo 'style="display: block;"'; ?>>
            <label for="Tiraje">Tiraje</label>
            <input name="Tiraje" id="Tiraje-id" class="form-control form-control-lg" type="number" placeholder="Tiraje" min="0" value="<?php echo $materialInfo['MaterialTiraje'] ?>" readonly>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="autor">Autor</label>
            <input name="autor" class="form-control form-control-lg" type="text" placeholder="Autor" required value="<?php echo $materialInfo['MaterialAutor'] ?>" readonly>
        </div>
        <div class="col">
            <label for="version">Versión</label>
            <input name="version" class="form-control form-control-lg" type="number" placeholder="Versión de material" min="0" value="<?php echo $materialInfo['MaterialVersion'] ?>" readonly>
        </div>
        <div class="col">
            <label for="anioEdicion">Año de edición</label>
            <input name="anioEdicion" class="form-control form-control-lg" type="number" placeholder="Año de edición" min="1960" max="2099" value="<?php echo $materialInfo['MaterialEdicion'] ?>" readonly>
        </div>
        <div class="col">
            <label for="noPaginas">Número de páginas</label>
            <input name="noPaginas" class="form-control form-control-lg" type="number" placeholder="Número de páginas" value="<?php echo $materialInfo['MaterialPaginas'] ?>" min="1" readonly>
        </div>

    </div>
    <div class="row g-9 mb-3">
        <div class="col">
            <label for="seccion">Sección del material</label>
            <select name="seccion" id="seccionSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" disabled>
                <option value="<?php echo $materialInfo['Seccion_Id'] ?>"> <?php echo $seccioninfo['SeccionNombre'] ?></option>

            </select>
        </div>
        <div class="col">
            <label for="area">Área del material</label>
            <select name="area" id="areaSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" disabled>
                <option value="<?php echo $materialInfo['Area_Id'] ?>"> <?php echo $materialInfo['AreaNombre'] ?></option>
            </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="downloadCount">Número de Descargas</label>
            <input name="downloadCount" class="form-control form-control-lg" type="number" min="1" value="1" required>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div>
            <input type="text" hidden name="idMaterial" value="<?php echo $materialInfo['Material_Id'] ?>">
        </div>
        <div class="col-md-12 text-center btn-pass">
            <label for="download2"> </label>
            <input name="download2" class="btn btn-primary botonCreateuser btn-tabla" type="submit" value="Descargar">

            <label for="cancelar"> </label>
            <input name="cancelar" type="submit" class="btn btn-primary botonCreateuser btn-tabla" value="Cancelar">
        </div>
    </div>
</form>