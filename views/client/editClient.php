<?php
$neighbordhood = new NeighborhoodController();
$neighs =$neighbordhood->showNeighborhoods();

$userCtrl = new UserController();
$users = $userCtrl->showUsers();
?>  
<?php if(isset($cli) && is_object($cli)) : ?>
    <h2 class="titulo-all">Editar cliente: <?=$cli->nombre?> </h2>
<?php endif; ?>
<form action="<?=base_url?>client/edit&codigo=<?=$cli->codigo?>" method="POST" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row mt-50">
                <label class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtNombre" value="<?=$cli->nombre?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Codigo</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtCodigo" value="<?=$cli->codigo?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Documento</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtDocumento" value="<?=$cli->documento?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tipo de Persona</label>
                <div class="col-sm-8">
                    <select class="form-control" id="exampleFormControlSelect1" name="txtTipo">
                        <option <?php echo $cli->tipo == 'Natural' ? 'selected="selected"': "" ?> value="Natural">Natural</option>
                        <option <?php echo $cli->tipo == 'Juridica' ? 'selected="selected"': "" ?> value="Juridica">Juridica</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha de Registro</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha_registro" value="<?=$cli->fecha_registro?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha inactivo</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha_inactivo" value="<?=$cli->fecha_inactivo?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Imagen</label>
                <div class="col-sm-8">
                    <img width="70px" src="<?=base_url?>assets/imgs/clients/<?=$cli->imagen?>" required>
                    <br>
                    <input type="file" name="imagen">
                </div>
            </div>

        </div>

        <div class="col-md-6">
        <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtEmail" value="<?=$cli->email?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Telefono</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtTelefono" value="<?=$cli->telefono?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Cupo</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtCupo" value="<?=$cli->cupo?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Usuario</label>
                <div class="col-sm-8">
                    <select class="form-control" id="exampleFormControlSelect1" name=txtUsuario>
                        <?php while($us = $users->fetch_object()) : ?>
                            <option <?php if($cli->usuario == $us->nombre) echo 'selected="selected"';?>><?=$us->nombre?></option>
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
                    <select class="form-control" id="exampleFormControlSelect1" name="barrio"  value="<?=$cli->barrio?>">
                    <?php while($neig = $neighs->fetch_object()) : ?>
                        <option <?php if($cli->barrio == $neig->nom_barrio) echo 'selected="selected"';?>><?=$neig->nom_barrio?></option>
                    <?php endwhile ?>
                    </select>
                </div>
            </div> 
        </div>
    </div>
</div>
    
           

           
          

            <!-- BOTON  -->
            <input type="submit" name="boton" value="Registrar" class="btn btn-primary btn-block"/>
            <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
    </form>