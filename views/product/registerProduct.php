<?php
    $provider = new ProviderController();
    $providers = $provider->showIdProviders();
?>

<form action="<?=base_url?>product/save" method="POST" enctype="multipart/form-data">
    <div class="form-group row mt-50">
        <label class="col-sm-4 col-form-label">Nombre</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNombre" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Imagen</label>
        <div class="col-sm-8">
            <input type="file" name="imagen" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Id Proveedor</label>
        <div class="col-sm-8">
        <select class="form-control" id="exampleFormControlSelect1" name="id_proveedor">
                <?php while($pr = $providers->fetch_object()) : ?>
                    <option><?=$pr->documento?></option>
                <?php endwhile ?>
        </div>
    </div>

    <!-- BOTON  -->
    <input type="submit" name="boton" value="Registrar" class="btn btn-primary btn-block"/>
    <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
</form>