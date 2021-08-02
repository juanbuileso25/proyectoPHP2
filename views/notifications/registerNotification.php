    <div class="box">
        
        <h3>Solicitud para modificar datos</h3>
        <br>
        <form action="<?=base_url?>notification/saveNotification" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <label class="">Descripción solicitud</label>
            </div>

            <div>
                <textarea widht="100%" name="txtDescripcion" cols="54">
                </textarea>
            </div>
            <!-- BOTON  -->
            <input type="submit" name="boton" value="Solicitar" class="btn btn-primary btn-block"/>
            <a href="<?=base_url?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
        </form>

        
    </div>
    <?php if(isset($_SESSION['completado'])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Solicitud enviada con exito!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   <?php endif; 
   Utils::deleteSessions('completado');
   ?>