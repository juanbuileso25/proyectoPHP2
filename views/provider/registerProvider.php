<?php
ob_start();
?>
<?php if(!isset($_SESSION['admin'])) : ?>
    <?=header('Location: '.base_url); ?>            
<?php else : ?>
<?php
    $neighbordhood = new NeighborhoodController();
    $neighs =$neighbordhood->showNeighborhoods();

    $userCtrl = new UserController();
    $users = $userCtrl->showUsers();
?>           
<form action="<?=base_url?>provider/save" method="POST" enctype="multipart/form-data">
    
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row mt-50">
                <label class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtNombre" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Documento</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtDocumento" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tipo de Persona</label>
                <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1" name="txtTipo">
                            <option>Natural</option>
                            <option>Juridica</option>
                        </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha de Registro</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha_registro" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Imagen</label>
                <div class="col-sm-8">
                    <input type="file" name="imagen" required>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtEmail" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Telefono</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtTelefono" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Usuario</label>
                <div class="col-sm-8">
                <select class="form-control" id="exampleFormControlSelect1" name=txtUsuario>
                    <?php while($us = $users->fetch_object()) : ?>
                        <option><?=$us->nombre?></option>
                    <?php endwhile ?>
                </select>
                </div>
            </div> 

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Barrio</label>
                <div class="col-sm-8">
                    <select class="form-control" id="exampleFormControlSelect1" name=barrio>
                        <?php while($neig = $neighs->fetch_object()) : ?>
                            <option><?=$neig->nom_barrio?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                </div>
            </div> 
        </div>
    </div>
</div>    
    
    
    <!-- BOTON  -->
    <input type="submit" name="boton" value="Registrar" class="btn btn-primary btn-block"/>
    <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
</form>
<?php endif; ?>

                    