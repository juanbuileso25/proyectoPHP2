<div class="container">
    <div class="row">
        <div class="col-3">
            <h3>Ubicación usuarios</h3>
            <br>
            <div class="card">
                <div class="card-body">
                    <form action="<?=base_url?>location/index" method="POST" class="form-mapa">
                        <div class="form-group">
                            <label class="card-title" for="exampleFormControlSelect1">Perfil</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="tipo">
								<option>Todos</option>
								<option>Cliente</option>
                                <option>Empleado</option>
                                <option>Proveedor</option>
                            </select>
                        </div>

                        <input type="submit" name="boton" value="Buscar" class="btn btn-primary btn-block"/>
                    </form>
                </div>
            </div>
            <br>
            <a class="" href="<?=base_url?>location/register">Registrar ubicacion de usuario</a>
        </div>
        <div class="col-9">
            <div class="mapa" id="mapid" style="width: 700px; height: 500px;"></div>
        </div>
    </div>
</div>
<?php
$location = new LocationController();
$show = $location->getLocations();

if(isset($_POST['tipo'])){
	if($_POST['tipo'] == "Cliente"){
		$show = $location->getClient();
	} elseif($_POST['tipo'] == "Empleado"){
		$show = $location->getEmployee();
	} elseif($_POST['tipo'] == "Proveedor") {
		$show = $location->getProvideer();
	} elseif($_POST['tipo'] == "Todos"){
		$show = $location->getLocations();
	}
}
echo "<script type='text/javascript'> \n";
echo "var dataJson = ".$show."; \n";
echo "</script> \n";
?>
<script>

	var mymap = L.map('mapid').setView([6.2522294, -75.5704394], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);


	for(var i = 0; i < dataJson.length; i++){
		L.marker([dataJson[i].latitud, dataJson[i].longitud]).addTo(mymap)
		.bindPopup(dataJson[i].nombre).openPopup();
	}

	


	// var popup = L.popup();

	// function onMapClick(e) {
	// 	popup
	// 		.setLatLng(e.latlng)
	// 		.setContent("You clicked the map at " + e.latlng.toString())
	// 		.openOn(mymap);
	// }

	// mymap.on('click', onMapClick);

</script>