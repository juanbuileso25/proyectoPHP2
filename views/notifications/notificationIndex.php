<h1 class="titulo-all">Notificaciones</h1>

<table id="tabla" class="content-table tam-table-producto">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <?php if(isset($_SESSION['admin'])) : ?> 
                <th>Fecha solicitud</th>
                <th>Usuario</th>
                <th>Modificar</th>
                <?php endif; ?> 
            </tr>
        </thead>
        <tbody>
        <?php while($not = $nots->fetch_object()) : ?>
            <tr>
                <th><?=$not->id_not?></th>
                <th><?=$not->descripcion?></th>
                <th><?=$not->fecha?></th>
                <th><?=$not->usuarioN?></th>
               <?php if(isset($_SESSION['admin'])) : ?> 
                <th><a class="btn btn-secondary" href="<?=base_url?>notification/updateNotification&id=<?=$not->id_not?>"><i class="fas fa-edit"></i></a></th>
                
               <?php endif; ?> 
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
