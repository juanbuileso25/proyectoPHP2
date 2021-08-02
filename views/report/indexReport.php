<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Listado de Clientes por Barrio y Comuna</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Listado de Proveedores por Barrio y Comuna</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Listado de Empleados por Barrio y Comuna</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

  <table id="tabla" class="content-table tam-table-report">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Barrio</th>
                <th>Comuna</th>
            </tr>
        </thead>
        <tbody>
        <?php while($cln = $clients->fetch_object()) : ?>
            <tr>
                <th><?=$cln->nombre?></th>
                <th><?=$cln->barrio?></th>
                <th><?=$cln->comuna?></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
</table>
       
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table id="tabla" class="content-table tam-table-report">
        <thead>
            <tr>
                <th>Nombre</th>  
                <th>Barrio</th>
                <th>Comuna</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
        <?php while($prov = $providers->fetch_object()) : ?>
            <tr>
                <th><?=$prov->nombre?></th>
                <th><?=$prov->barrio?></th>
                <th><?=$prov->comuna?></th>
                <th><?=$prov->nombreP?></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

  <table id="tabla" class="content-table tam-table-report">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Barrio</th>
                <th>Comuna</th>
            </tr>
        </thead>
        <tbody>
        <?php while($emp = $employees->fetch_object()) : ?>
            <tr>
                <th><?=$emp->nombre?></th>
                <th><?=$emp->barrio?></th>
                <th><?=$emp->comuna?></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
</table>
       

  </div>
</div>
        