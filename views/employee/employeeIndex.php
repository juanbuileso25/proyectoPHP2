<h1 class="titulo-all">Empleados</h1>
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

<table id="tabla" class="content-table tam-table-empleado table-responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Fecha ingreso</th>
                <th>Fecha retiro</th>
                <th>Salario</th>
                <th>Deducción</th>
                <th>Foto</th>
                <th>Hoja de vida</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Usuario</th>
                <th>Barrio</th>
                <th>Comuna</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php while($emp = $employees->fetch_object()) : ?>
            <tr>
                <th><?=$emp->nombre?></th>
                <th><?=$emp->documento?></th>
                <th><?=$emp->fecha_ingreso?></th>
                <th><?=$emp->fecha_retiro?></th>
                <th><?=$emp->salario_basico?></th>
                <th><?=$emp->deducion?></th>
                <th><img width="60px" src="<?=base_url?>assets/imgs/employees/<?=$emp->foto?>"></th>
                <th><a href="<?=base_url?>employee/downloadFile&file=<?=$emp->hoja_vida?>"><?=$emp->hoja_vida?></a></th>
                <th><?=$emp->email?></th>
                <th><?=$emp->telefono?></th>
                <th><?=$emp->celular?></th>
                <th><?=$emp->usuario?></th>
                <th><?=$emp->barrio?></th>
                <th><?=$emp->comuna?></th>
                <th><a class="btn btn-secondary" href="<?=base_url?>employee/editForm&documento=<?=$emp->documento?>"><i class="fas fa-edit"></i></a></th>
                <th><a class="btn btn-danger" href="<?=base_url?>employee/delete&documento=<?=$emp->documento?>"><i class="fas fa-trash-alt"></i></a></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a class="btn-nuevo-empleado" href="<?=base_url?>employee/register">Crear nuevo empleado</a>
<?php 
    if(isset($_SESSION['completado'])) {
        Utils::deleteSessions('completado'); 
    } elseif(isset($_SESSION['errores'])) {
        Utils::deleteSessions('errores'); 
    }
?>
    
    