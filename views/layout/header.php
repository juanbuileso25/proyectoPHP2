<?php
//Mostrar la cantidad de notificaciones
$not = new NotificationController();
$cant = $not->getNotis();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="ansi">
    <title>Proyecto PHP</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/menu.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
  </head>
  <body>

    <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#">Proyecto Aula</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php if(isset($_SESSION['admin']) || isset($_SESSION['usuario'])) : ?>
            <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
              <ul class="navbar-nav  position-nav ">
                

              <div>

                <li class="profile-ava inline-n">
                    <img alt="" src="<?=base_url?>assets/imgs/user.png">
                </li>
              
                <li class="nav-item dropdown inline-n">
                
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$_SESSION['identity']->nombre?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item hover-item" href="<?=base_url?>notification/showRequest&user=<?=$_SESSION['identity']->nombre?>"><i class="fas fa-user"></i> Mi perfil</a>
                      
                      <?php if(isset($_SESSION['admin'])) : ?>

                        <a class="dropdown-item hover-item" 
                          href="<?=base_url?>notification/indexNotification"><i class="fas fa-bell"></i>
                              Notificaciones
                          <span class="badge"><?=$cant?></span>
                        </a>
                      <?php endif; ?>
                        
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item hover-item" href="<?=base_url?>user/logout"><i class="fas fa-power-off ml-0"></i> Cerrar Sesión</a>
                    </div>
                  </li>
              </div>
            </div>
        <?php endif; ?>
    </nav>
      
  </header>



