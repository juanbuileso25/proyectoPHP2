function consultarClientes(){
            
    var parametros = {
    "btnConsultarClientes": 'true',

};
$.ajax({
    data: parametros,
    url: '../control/ControlClientes.php',
    type: 'post',
    async: false,
    dataType: 'JSON',
    success: function(response) {
        console.log(response['rpta']);
        var array = response['rpta'];
        var contenedor = document.querySelector("#tablaCliente");
        var html = "";
        array.forEach(val =>{
            html+= `
                <tr class="tam">
                    <th>`+val[0]+`</th>
                    <th>`+val[1]+`</th>
                    <th>`+val[2]+`</th>
                    <th>`+val[3]+`</th>
                    <th>`+val[4]+`</th>
                    <th>`+val[5]+`</th>
                    <th>`+val[6]+`</th>
                    <th>`+val[7]+`</th>
                    <th>`+val[8]+`</th>
                    <th>`+val[9]+`</th>
                    <th>`+val[10]+`</th>
                    <th><a href="#"><i class="fas fa-edit"></i></a></th>
                    <th><a href="#"><i class="fas fa-trash-alt"></i></a></th>
                </tr>
            `;
        });
        
        contenedor.innerHTML= html;
    }
});

      
}