<?php if(isset($pro) && is_object($pro)) : ?>
        <h2 class="titulo-all">Editar producto: <?=$pro->nombreP?> </h2>
<?php endif; ?>
<form action="<?=base_url?>product/edit&id=<?=$pro->id?>" method="POST" enctype="multipart/form-data">
    <div class="form-group row mt-50">
        <label class="col-sm-4 col-form-label">Id</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNombre" value="<?=$pro->id?>" disabled>
        </div>
    </div>

    <div class="form-group row mt-50">
        <label class="col-sm-4 col-form-label">Nombre</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNombre" value="<?=$pro->nombreP?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Imagen</label >
        <div class="col-sm-8">
            <img width="70px" src="<?=base_url?>assets/imgs/products/<?=$pro->imagen?>" required>
            <br>
            <input type="file" name="imagen">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Estado</label>
        <div class="col-sm-8">
            <select class="form-control" id="exampleFormControlSelect1" name="txtEstado">
                    <option>activo</option>
                    <option>inactivo</option>
            </select>
        </div>
    </div> 

    <!-- BOTON  -->
    <input type="submit" name="boton" value="Guardar" class="btn btn-primary btn-block"/>
    <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
</form>