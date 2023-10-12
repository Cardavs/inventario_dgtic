<form class="container col-md-12 col-sm-4 formulario" action="" method="post">
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="NombreMaterial">Nombre de Material</label>
            <input id="NombreMaterial" class="form-control form-control-lg" type="text" placeholder="<?php echo $infoMaterials['MaterialNombre'];?>" disabled>
        </div>
        <?php if (!is_null($infoMaterials['MaterialISBN']) and !is_null($infoMaterials['MaterialTiraje'])) {
        ?>
        <div class="col p-3">
            <div class="form-check m-2">
                <input class="form-check-input" type="radio" name="tipo" id="auditoria" checked disabled>
                <label class="form-check-label m-2" for="tipo">
                    Auditoría
                </label>
            </div>
        </div>
        <div class="col">
            <label for="ISBN">ISBN</label>
            <input name="ISBN" class="form-control form-control-lg" type="text" placeholder="<?php echo $infoMaterials['MaterialISBN']; ?>" disabled>
        </div>
        <div class="col">
            <label for="Tiraje">Tiraje</label>
            <input name="Tiraje" class="form-control form-control-lg" type="text" placeholder=<?php echo $infoMaterials['MaterialTiraje']; ?> disabled>
        </div>
        <?php }else{?>
            <div class="col p-3">
            <div class="form-check m-2">
                <input class="form-check-input" type="radio" name="tipo" id="auditoria" checked disabled>
                <label class="form-check-label m-2" for="tipo">
                    Compilación
                </label>
            </div>
        </div>
            <?php } ?>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="Autor">Autor</label>
            <input id="Autor" class="form-control form-control-lg" type="text" placeholder="<?php echo $infoMaterials['MaterialAutor']; ?>" disabled>
        </div>
        <div class="col">
            <label for="Versión">Versión</label>
            <input id="Versión" class="form-control form-control-lg" type="text" placeholder=<?php echo $infoMaterials['MaterialVersion']; ?> disabled>
        </div>
        <div class="col">
            <label for="AñoEdicion">Año de edición</label>
            <input id="AñoEdicion" class="form-control form-control-lg" type="text" placeholder=<?php echo $infoMaterials['MaterialEdicion']; ?> disabled>
        </div>
        <div class="col">
            <label for="NoPaginas">Número de páginas</label>
            <input id="NoPaginas" class="form-control form-control-lg" type="text" placeholder=<?php echo $infoMaterials['MaterialPaginas']; ?> disabled>
        </div>

    </div>
    <div class="row g-9 mb-3">
        <div class="col">
            <label for="seccion">Sección del material</label>
            <input id="seccion" class="form-control form-control-lg" type="text" placeholder="<?php echo $infoMaterials['SeccionNombre']; ?>" disabled>
        </div>
        <div class="col">
            <label for="area">Área del material</label>
            <input id="area" class="form-control form-control-lg" type="text" placeholder="<?php echo $infoMaterials['AreaNombre']; ?>" disabled>
        </div>
    </div>
</form>