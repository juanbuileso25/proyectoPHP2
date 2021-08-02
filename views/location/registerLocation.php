<?php
$userCtrl = new UserController();
$users = $userCtrl->showUsers();
?>
<div class="box">
    <h3>Registrar ubicación</h3>
    <!-- Alertas -->
   <?php if(isset($_SESSION['completado'])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Acción realizada con exito!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   <?php elseif(isset($_SESSION['errores'])) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>No se pudo completar la acción!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   <?php endif; ?>
        <form action="<?=base_url?>location/save" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="card-title" for="exampleFormControlSelect1">Usuario</label>
                <select class="form-control" id="exampleFormControlSelect1" name=selectUsuario>
                <?php while($us = $users->fetch_object()) : ?>
                    <option><?=$us->nombre?></option>
                <?php endwhile ?>
                </select>
            </div>
            <div class="input-box">
                <label class="">Latitud</label>
            </div>
            <div class="input-box">
                <input type="text" name="latitud">
            </div>
            <div class="input-box">
                <label class="">Longitud</label>
            </div>
            <div class="input-box">
                <input type="text" name="longitud">
            </div>
            <!-- BOTON  -->
            <input type="submit" name="boton" value="Guardar" class="btn btn-primary btn-block"/>
        </form>
    </div>
<?php Utils::deleteSessions('completado'); ?>