<h1 class="titulo-all">Productos</h1>
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
<table id="tabla" class="content-table tam-table-producto">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Producto</th>
                <th>Imagen</th>
                <th>Proveedor</th>
                <?php if(isset($_SESSION['admin'])) : ?> 
                <th>Editar</th>
                <th>Eliminar</th>
                <?php endif; ?> 
            </tr>
        </thead>
        <tbody>
            
        <?php while($prod = $products->fetch_object()) : ?>
            <tr>
                <th><?=$prod->id?></th>
                <th><?=$prod->nombreP?></th>
                <th><img width="80px" src="<?=base_url?>assets/imgs/products/<?=$prod->imagen?>"></th>
                <th><?=$prod->nombre?></th>
                <?php if(isset($_SESSION['admin'])) : ?> 
                <th><a class="btn btn-secondary" href="<?=base_url?>product/editForm&id=<?=$prod->id?>"><i class="fas fa-edit"></i></a></th>
                <th><a class="btn btn-danger" href="<?=base_url?>product/delete&id=<?=$prod->id?>"><i class="fas fa-trash-alt"></i></a></th>
               <?php endif; ?> 
            </tr>
            <?php endwhile; ?>

           
        </tbody>
    </table>
    <?php if(isset($_SESSION['admin'])) : ?> 
        <a class="btn-nuevo-producto" href="<?=base_url?>product/register">Crear nuevo producto</a>
    <?php endif; ?> 
    <?php 
    if(isset($_SESSION['completado'])) {
        Utils::deleteSessions('completado'); 
    } elseif(isset($_SESSION['errores'])) {
        Utils::deleteSessions('errores'); 
    }
    ?>
    
    