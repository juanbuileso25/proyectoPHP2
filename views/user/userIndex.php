

    <h1 class="titulo-all">Usuarios</h1>

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

<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table id="tabla" class="content-table tam-table-usuario">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php while($us = $users->fetch_object()) : ?>
            <tr>
                <th><?=$us->nombre?></th>
                <th><?=$us->perfil?></th>
                <th><a class="btn btn-secondary" href="<?=base_url?>user/editForm&nombre=<?=$us->nombre?>"><i class="fas fa-edit"></i></a></th>
                <th><a class="btn btn-danger" href="<?=base_url?>user/delete&nombre=<?=$us->nombre?>"><i class="fas fa-trash-alt"></i></a></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>
  <br>  
    <a class="btn-nuevo-usuario" href="<?=base_url?>user/register">Crear nuevo usuario</a>

    <?php 
    if(isset($_SESSION['completado'])) {
        Utils::deleteSessions('completado'); 
    } elseif(isset($_SESSION['errores'])) {
        Utils::deleteSessions('errores'); 
    }
    
    
   
