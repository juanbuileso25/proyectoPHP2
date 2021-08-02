<?php if(isset($_SESSION['usuario'])) : ?>
<h1 class="titulo-all">Solicitudes de modificación de datos</h1>

<table id="tabla" class="content-table tam-table-producto">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <th>Fecha solicitud</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php while($req = $reqs->fetch_object()) : ?>
            <tr>
                <th><?=$req->id_not?></th>
                <th><?=$req->descripcion?></th>
                <th><?=$req->fecha?></th>
                <?php if($req->estado == 'activo') : ?>
                <th>Pendiente por modificar</th>
                <?php else : ?>
                <th>Modificación realizada</th>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php endif; ?>