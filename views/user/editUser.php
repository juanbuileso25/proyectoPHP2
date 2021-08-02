

<?php if(isset($us) && is_object($us)) : ?>
    <h2 class="titulo-all">Editar usuario: <?=$us->nombre?> </h2>
<?php endif; ?>

<br>

<form action="<?=base_url?>user/edit&nombre=<?=$us->nombre?>" method="POST">
    <div class="form-group row mt-50">
        <label class="col-sm-4 col-form-label">Usuario</label>
        <div class="col-sm-8">
            <input type="text" class="form-control disabled" name="txtUsuario" value="<?=$us->nombre?>" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Contraseña</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" name="txtContrasena" value="<?=$us->contrasena?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Perfil</label>
        <div class="col-sm-8">
            <select class="form-control" id="exampleFormControlSelect1" name="txtPerfil">
                <option <?php echo $us->perfil == 'admin' ? 'selected="selected"': "" ?> value="admin">admin</option>
                <option <?php echo $us->perfil == 'cliente' ? 'selected="selected"': "" ?> value="cliente">cliente</option>
                <option <?php echo $us->perfil == 'empleado' ? 'selected="selected"': "" ?> value="empleado">empleado</option>
                <option <?php echo $us->perfil == 'proveedor' ? 'selected="selected"': "" ?> value="proveedor">proveedor</option>
            </select>
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