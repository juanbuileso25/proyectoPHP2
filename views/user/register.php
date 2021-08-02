
<form action="<?=base_url?>user/save" method="POST">
    <div class="form-group row mt-50">
        <label class="col-sm-4 col-form-label">Usuario</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtUsuario" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Contraseña</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" name="txtContrasena" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Perfil</label>
        <div class="col-sm-8">
            <select class="form-control" id="exampleFormControlSelect1" name="txtPerfil">
                <option>admin</option>
                <option>cliente</option>
                <option>empleado</option>
                <option>proveedor</option>
            </select>
        </div>
    </div>


    <!-- BOTON  -->
    <input type="submit" name="boton" value="Registrar" class="btn btn-primary btn-block"/>
    <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
</form>