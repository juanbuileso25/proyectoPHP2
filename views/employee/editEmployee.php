<?php
$neighbordhood = new NeighborhoodController();
$neighs =$neighbordhood->showNeighborhoods();

$userCtrl = new UserController();
$users = $userCtrl->showUsers();
?>  

<?php if(isset($emp) && is_object($emp)) : ?>
        <h2 class="titulo-all">Editar empleado: <?=$emp->nombre?> </h2>
    <?php endif; ?>

        
        <form action="<?=base_url?>employee/edit&documento=<?=$emp->documento?>" method="POST" enctype="multipart/form-data">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row mt-50">
                <label class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtNombre" value="<?=$emp->nombre?>">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Documento</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtDocumento" value="<?=$emp->documento?>" disabled>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha de Ingreso</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha_ingreso" value="<?=$emp->fecha_ingreso?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha Retiro</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha_retiro" value="<?=$emp->fecha_retiro?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Salario</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="txtSalario" value="<?=$emp->salario_basico?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Deduccion</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="txtDeduccion" value="<?=$emp->deducion?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Imagen</label>
                <div class="col-sm-8">
                    <img width="70px" src="<?=base_url?>assets/imgs/employees/<?=$emp->foto?>" >
                    <br>
                    <input type="file" name="imagen">
                </div>
            </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                <label class="col-sm-4 col-form-label">Hoja de vida</label>
                <div class="col-sm-8">
                    <input type="file" name="hoja_vida">
                </div>
            </div> 

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtEmail" value="<?=$emp->email?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Telefono</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtTelefono" value="<?=$emp->telefono?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Celular</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtCelular" value="<?=$emp->celular?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Usuario</label>
                <div class="col-sm-8">
                    <select class="form-control" id="exampleFormControlSelect1" name=txtUsuario>
                        <?php while($us = $users->fetch_object()) : ?>
                            <option <?php if($emp->usuario == $us->nombre) echo 'selected="selected"';?>><?=$us->nombre?></option>
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
                        <option <?php if($emp->barrio == $neig->nom_barrio) echo 'selected="selected"';?>><?=$neig->nom_barrio?></option>
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