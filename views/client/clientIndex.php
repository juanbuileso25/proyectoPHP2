<h1 class="titulo-all">Clientes</h1>
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
    <table id="tabla" class="content-table tam-table-cliente table-responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Documento</th>
                <th>Tipo</th>
                <th>Fecha registro</th>
                <th>Fecha inactivo</th>
                <th>Imagen</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Cupo</th>
                <th>Usuario</th>
                <th>Barrio</th>
                <th>Comuna</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php while($cln = $clients->fetch_object()) : ?>
            <tr>
                <th><?=$cln->nombre?></th>
                <th><?=$cln->codigo?></th>
                <th><?=$cln->documento?></th>
                <th><?=$cln->tipo?></th>
                <th><?=$cln->fecha_registro?></th>
                <th><?=$cln->fecha_inactivo?></th>
                <th><img src="<?=base_url?>assets/imgs/clients/<?=$cln->imagen?>" width="80px"></th>
                <th><?=$cln->email?></th>
                <th><?=$cln->telefono?></th>
                <th><?=$cln->cupo?></th>
                <th><?=$cln->usuario?></th>
                <th><?=$cln->barrio?></th>
                <th><?=$cln->comuna?></th>
                <th><a class="btn btn-secondary" href="<?=base_url?>client/editForm&codigo=<?=$cln->codigo?>"><i class="fas fa-edit"></i></a></th>
                <th><a class="btn btn-danger" href="<?=base_url?>client/delete&codigo=<?=$cln->codigo?>"><i class="fas fa-trash-alt"></i></a></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a class="btn-nuevo-cliente" href="<?=base_url?>client/register">Crear nuevo cliente</a>
    <?php 
    if(isset($_SESSION['completado'])) {
        Utils::deleteSessions('completado'); 
    } elseif(isset($_SESSION['errores'])) {
        Utils::deleteSessions('errores'); 
    }
    ?>
    
    
   