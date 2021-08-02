<div class="sidebar">
<?php if(!isset($_SESSION['identity']) || !isset($_SESSION)) : ?>
    <h4 class="titulo-all">Login</h4>
    <form class="login" action="<?=base_url?>user/login" method="POST">
        <div class="textbox">
            <input type="text" placeholder="Usuario" name="txtNombre">    
        </div>
       <div class="textbox">
            <input type="password" placeholder="Contraseña" name="txtContrasena">   
       </div>
       <div class="recordar">
            <input type="checkbox" name="recordar" value="">
            <label for="recordar">Recordar Usuario</label><br>
        </div>
        <input class="btn-login" type="submit" value="Ingresar"> 
        <br>
        <br>
        <?php if(isset($_SESSION['error_login'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Datos incorrectos</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="olvidar">
            <a  href="">¿Olvidaste tu usuario o contraseña?</a>
        </div>
    </form>
    <hr>        
<?php endif; ?>
<?php if(isset($_SESSION['admin'])) : ?>
        <a class="items" href="<?=base_url?>user/index"><i class="fas fa-user-lock"></i><span>Usuarios</span></a>
        <a class="items" href="<?=base_url?>client/index"><i class="fas fa-user-tie"></i><span>Clientes</span></a>
        <a class="items" href="<?=base_url?>employee/index"><i class="fas fa-id-card"></i><span>Empleados</span></a>
        <a class="items" href="<?=base_url?>product/index"><i class="fas fa-shopping-cart"></i><span>Productos</span></a>
        <a class="items" href="<?=base_url?>provider/index"><i class="fas fa-users"></i><span>Proveedores</span></a> 
        <a class="items" href="<?=base_url?>report/index"><i class="fas fa-users"></i><span>Informes</span></a>     
        <a class="items" href="<?=base_url?>location/index"><i class="fas fa-chart-bar"></i><span>Ubicacion Usuarios</span></a>
<?php elseif(isset($_SESSION['usuario'])) : ?>
        <a class="items" href="<?=base_url?>product/index"><i class="fas fa-shopping-cart"></i><span>Productos</span></a>
        <a class="items" href="<?=base_url?>notification/registerNotification"><i class="fas fa-user-edit"></i><span>Modificar datos</span></a>
<?php endif; ?>
</div>
<?php if(isset($_SESSION['error_login'])) {
        Utils::deleteSessions('error_login'); 
}?>
<div class="central">
