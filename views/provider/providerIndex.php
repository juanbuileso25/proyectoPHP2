<?php
ob_start();
?>
<h1 class="titulo-all">Proveedores</h1>
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
    <table id="tabla" class="content-table tam-table-cliente">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha registro</th>
                <th>Fecha inactivo</th>
                <th>Imagen</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Usuario</th>
                <th>Barrio</th>
                <th>Comuna</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php while($prov = $providers->fetch_object()) : ?>
            <tr>
                <th><?=$prov->documento?></th>
                <th><?=$prov->nombre?></th>
                <th><?=$prov->tipo?></th>
                <th><?=$prov->fecha_registro?></th>
                <th><?=$prov->fecha_inactivo?></th>
                <th><img width="80px" src="<?=base_url?>assets/imgs/providers/<?=$prov->imagen?>"></th>
                <th><?=$prov->email?></th>
                <th><?=$prov->telefono?></th>
                <th><?=$prov->usuario?></th>
                <th><?=$prov->barrio?></th>
                <th><?=$prov->comuna?></th>
                <th><a class="btn btn-secondary" href="<?=base_url?>provider/editForm&documento=<?=$prov->documento?>"><i class="fas fa-edit edit"></i></a></th>
                <th><a class="btn btn-danger" href="<?=base_url?>provider/delete&documento=<?=$prov->documento?>"><i class="fas fa-trash-alt"></i></a></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a class="btn-nuevo-proveedor" href="<?=base_url?>provider/register">Crear nuevo proveedor</a>
<?php if(isset($_SESSION['completado'])) {
        Utils::deleteSessions('completado'); 
    } elseif(isset($_SESSION['errores'])) {
        Utils::deleteSessions('errores'); 
    }?>
<?php
ob_end_flush();
?>