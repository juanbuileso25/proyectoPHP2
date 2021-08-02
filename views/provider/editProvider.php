<?php
$neighbordhood = new NeighborhoodController();
$neighs =$neighbordhood->showNeighborhoods();

$userCtrl = new UserController();
$users = $userCtrl->showUsers();
?>  

<?php if(!isset($_SESSION['admin'])){
header('Location '.base_url);
} ?>


<?php if(isset($prov) && is_object($prov)) : ?>
<h2 class="titulo-all">Editar proveedor: <?=$prov->nombre?> </h2>
<?php endif; ?>

<form action="<?=base_url?>provider/edit&documento=<?=$prov->documento?>" method="POST" enctype="multipart/form-data">
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="form-group row mt-50">
        <label class="col-sm-4 col-form-label">Nombre</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtNombre" value="<?=$prov->nombre?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Documento</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtDocumento" value="<?=$prov->documento?>" disabled>
        </div>
    </div>

    <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tipo de Persona</label>
                <div class="col-sm-8">
                    <select class="form-control" id="exampleFormControlSelect1" name="txtTipo">
                        <option <?php echo $prov->tipo == 'Natural' ? 'selected="selected"': "" ?> value="Natural">Natural</option>
                        <option <?php echo $prov->tipo == 'Juridica' ? 'selected="selected"': "" ?> value="Juridica">Juridica</option>
                    </select>
                </div>
            </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Fecha de Registro</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" name="fecha_registro" value="<?=$prov->fecha_registro?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Fecha Inactivo</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" name="fecha_inactivo" value="<?=$prov->fecha_inactivo?>" required>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Imagen</label>
        <div class="col-sm-8">
            <img width="70px" src="<?=base_url?>assets/imgs/providers/<?=$prov->imagen?>" required>
            <br>
            <input type="file" name="imagen">
        </div>
    </div>

            </div>
            <div class="col-md-6">
            <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtEmail" value="<?=$prov->email?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Telefono</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="txtTelefono" value="<?=$prov->telefono?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Usuario</label>
        <div class="col-sm-8">
            <select class="form-control" id="exampleFormControlSelect1" name=txtUsuario>
                <?php while($us = $users->fetch_object()) : ?>
                    <option <?php if($prov->usuario == $us->nombre) echo 'selected="selected"';?>><?=$us->nombre?></option>
                <?php endwhile ?>
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

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Barrio</label>
        <div class="col-sm-8">
            <select class="form-control" id="exampleFormControlSelect1" name="barrio">
            <?php while($neig = $neighs->fetch_object()) : ?>
                <option <?php if($prov->barrio == $neig->nom_barrio) echo 'selected="selected"';?>><?=$neig->nom_barrio?></option>
            <?php endwhile ?>
            </select>
        </div>
    </div> 
            </div>
        </div>
    </div>
    
    
    

    <!-- BOTON  -->
    <input type="submit" name="boton" value="Guardar" class="btn btn-primary btn-block"/>
    <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
</form>