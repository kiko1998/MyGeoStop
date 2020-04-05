<?php
    include "src/session_start.php";
    include "config/conexion.php";
    include "config/server.php";

?>


<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Editar servicio - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include "src/Estilos.html";
    ?>
    <link href='assets/css/family.css' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <!--integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" -->
    <link rel="stylesheet" href="assets/css/leaflet.css" crossorigin=""/>

    <!--<script type="text/javascript" src="jquery-3.4.1.min.js"></script>-->
    <!--integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" -->
    <script src="assets/js/leaflet.js" crossorigin=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js"></script>

    <script src="assets/js/libreria_gpx.js"></script>
    
    

</head>
<body>
<!-- Menú-->

<?php include("src/menu.php")
?>


<!-- Menú  -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include("head.php")
    ?>
    <!-- Header-->


    <div class="specialcontent">
        <div class="animated fadeIn">


            <div class="card">
                
                
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title">Editar servicio</strong>

                    </div>
                    <div class="card-body">

                        <div class="fontawesome-icon-list">

                            <div class="content">

                                <div class="animated fadeIn">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="card">

                                                <div class="card-body">

                                                    <table id="bootstrap-data-table"
                                                           class="table table-striped table-bordered">

                                                        <thead>
                                                        <tr>
                                                            <th>Nombre_servicio</th>
                                                            <th>Usuario</th>
                                                            <th>Matrícula camión</th>
                                                            <th>Ruta</th>
                                                            <th>Fecha inicio</th>
                                                            <th>Fecha fin</th>
                                                        </tr>
                                                        </thead>

                                                        <form method="POST" action="Guardar_servicio.php"
                                                              name="formulario">

                                                            <?php
                         

                         //recibir valores del anterior formulario
                         $id_servicio = $_GET["id_servicio"];
                      
                        
                           //Consulta
                            $sql ="SELECT s.id_servicio,s.Nombre_servicio,s.Id_usuario,s.Id_camion,s.Id_ruta,U.Nombre_y_apellido,c.Matricula_camion,R.Nombre_ruta,s.Fecha_inicio,s.Fecha_fin from Servicio s,Camion c,Ruta R,Usuario U where U.id_usuario=s.Id_usuario and c.Id_camion=s.Id_camion and R.Id_ruta=s.Id_ruta and id_servicio= $id_servicio;" ;
                        
                            $result = mysqli_query($db, $sql);
                         
                            $resultCheck = mysqli_num_rows($result);
                              

                                
                          //Consulta para el estado
                          while ($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";

                                                            $id_camion=$row['Id_camion'];

                                                            $Nombre_servicio=$row['Nombre_servicio'];

                                                            $Id_ruta_servicio=$row['Id_ruta'];

                                                            $Fecha_inicio=$row['Fecha_inicio'];

                                                            $Fecha_fin=$row['Fecha_fin'];

                                                            $Id_usuario=$row['Id_usuario'];


                                                            echo "
                                                            <td>
                                                                <input type='text' name='Nombre_servicio' required
                                                                       value='$Nombre_servicio'/>
                                                                ";
                                                                echo"
                                                            <td>
                                                                <label name='Usuario'>

                                                                    <select id='Usuario' name='Id_usuario' selected>";

                                                                        $sql ="SELECT * from Usuario where
                                                                        id_tipo_usuario=3;";

                                                                        $result = mysqli_query($db, $sql);

                                                                        $resultCheck = mysqli_num_rows($result);

                                                                        if ($resultCheck > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result)){

                                                                        $id_usuario = $row['id_usuario'];
                                                                        if ($Id_usuario == $id_usuario){

                                                                        echo"
                                                                        <option name='id_usuario'
                                                                                value='$row[id_usuario]'
                                                                                selected>$row[Nombre_y_apellido]
                                                                        </option>
                                                                        ";
                                                                        }


                                                                        else{
                                                                        echo"
                                                                        <option name='id_usuario'
                                                                                value='$row[id_usuario]'>
                                                                            $row[Nombre_y_apellido]
                                                                        </option>
                                                                        ";
                                                                        }


                                                                        }

                                                                        }
                                                                        echo "</td>";


                                                            //Consulta para el desplegable Camion

                                                            echo"
                                                            <td>
                                                                <label name='Camion'>

                                                                    <select id='Id_camion' name='Id_camion' selected>";


                                                                        $sql ="SELECT * from Camion;";

                                                                        $result = mysqli_query($db, $sql);

                                                                        $resultCheck = mysqli_num_rows($result);

                                                                        if ($resultCheck > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result)){

                                                                        $Id_camion = $row['Id_camion'];
                                                                        if ($id_camion == $Id_camion){
                                                                        echo"
                                                                        <option name='Id_camion' value='$row[Id_camion]'
                                                                                selected>$row[Matricula_camion]
                                                                        </option>
                                                                        ";
                                                                        }


                                                                        else{
                                                                        echo"
                                                                        <option name='Id_camion'
                                                                                value='$row[Id_camion]'>
                                                                            $row[Matricula_camion]
                                                                        </option>
                                                                        ";
                                                                        }


                                                                        }

                                                                        }
                                                                        echo "</td>";


                                                            // Desplegable color
                                                            echo"
                                                            <td>
                                                                <label name='Id_ruta'>

                                                                    <select id='id_Id_ruta' name='Id_ruta' selected>";


                                                                        $sql ="SELECT * from Ruta;";

                                                                        $result = mysqli_query($db, $sql);

                                                                        $resultCheck = mysqli_num_rows($result);

                                                                        if ($resultCheck > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result)){

                                                                        $Id_ruta = $row['Id_ruta'];
                                                                        if ($Id_ruta_servicio == $Id_ruta){

                                                                        echo"
                                                                        <option name='Id_ruta' value='$row[Id_ruta]'
                                                                                selected>$row[Nombre_ruta]
                                                                        </option>
                                                                        ";
                                                                        }


                                                                        else{
                                                                        echo"
                                                                        <option name='Id_ruta' value='$row[Id_ruta]'>
                                                                            $row[Nombre_ruta]
                                                                        </option>
                                                                        ";
                                                                        }


                                                                        }

                                                                        }
                                                                        echo "</td>";


                                                            echo "
                                                            <td>
                                                                <input type='date' name='Fecha_inicio' required
                                                                       value='$Fecha_inicio'/>
                                                                </br>
                                                                <br>";
                                                                echo"
                                                            </td>
                                                            <td>
                                                                <input type='date' name='Fecha_fin' required
                                                                       value='$Fecha_fin'/>
                                                                </br>
                                                                <br>
                                                            </td>
                                                            ";
                                                            
                                                            
                                                            echo "</tr>";
                                                            }
                                                            

                                                            ?>
                                                            

                                                    </table>


                                                    <br>

                                                    <input type="hidden" name="id_servicio"
                                                           value="<?php echo $id_servicio ?>"/>
                                                    <br>
                                                    <a href="Servicio.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>
                                                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                                            name="Guardar" id="Guardar">Guardar</a></button>

                                                    <br>

                                                </div>
                                                <div id="mapid" style="width: 1300px; height: 700px;"></div>
                                                <script>


                                                    var map = L.map('mapid').setView([37.772818, -3.791227], 15);

                                                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                                        maxZoom: 80,
                                                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                                        id: 'mapbox/streets-v11'
                                                    }).addTo(map);
                                                </script>
                                                
                                                <?php
                                                    /*on ready y on change
    
                                                   Icono por defecto
                                                   L.marker([51.5, -0.09]).addTo(map)
                                                   .bindPopup('<b>Hello world!</b><br/>I am a popup.').openPopup();
                                                   */
                                                   

                                                ?>
                                                <script>
                                                    var Green = L.icon({
                                                        iconUrl: '../../assets/images/marker-icon-green.png',
                                                        // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                        iconSize: [30, 30], // size of the icon
                                                        shadowSize: [50, 64], // size of the shadow
                                                        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                                                        shadowAnchor: [4, 62],  // the same for the shadow
                                                        popupAnchor: [-7, -85] // point from which the popup should open relative to the iconAnchor
                                                    });
                                                    var Blue = L.icon({
                                                        iconUrl: '../../assets/images/marker-icon-blue.png',
                                                        // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                        iconSize: [30, 30], // size of the icon
                                                        shadowSize: [50, 64], // size of the shadow
                                                        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                                                        shadowAnchor: [4, 62],  // the same for the shadow
                                                        popupAnchor: [-7, -85] // point from which the popup should open relative to the iconAnchor
                                                    });


                                                    var Yellow = L.icon({
                                                        iconUrl: '../../assets/images/marker-icon-yellow.png',
                                                        // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                        iconSize: [30, 30], // size of the icon
                                                        shadowSize: [50, 64], // size of the shadow
                                                        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                                                        shadowAnchor: [4, 62],  // the same for the shadow
                                                        popupAnchor: [-7, -85] // point from which the popup should open relative to the iconAnchor
                                                    });


                                                    var Red = L.icon({
                                                        iconUrl: '../../assets/images/marker-icon-red.png',
                                                        // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                        iconSize: [30, 30], // size of the icon
                                                        shadowSize: [50, 64], // size of the shadow
                                                        iconAnchor: [40, 94], // point of the icon which will correspond to marker's location
                                                        shadowAnchor: [4, 62],  // the same for the shadow
                                                        popupAnchor: [-25, -80] // point from which the popup should open relative to the iconAnchor
                                                    });
                                                    //Pinta de color rosa pongo negro para que se conecte a la base de datos
                                                    var Pink = L.icon({
                                                        iconUrl: '../../assets/images/marker-icon-pink.png',
                                                        // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                        iconSize: [30, 30], // size of the icon
                                                        shadowSize: [50, 64], // size of the shadow
                                                        iconAnchor: [40, 94], // point of the icon which will correspond to marker's location
                                                        shadowAnchor: [4, 62],  // the same for the shadow
                                                        popupAnchor: [-25, -80] // point from which the popup should open relative to the iconAnchor
                                                    });
                                                    var Camion = L.icon({
                                                            iconUrl: '../../assets/images/truck.png',
                                                            // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                            iconSize: [30, 80], // size of the icon
                                                            shadowSize: [50, 64], // size of the shadow
                                                            iconAnchor: [40, 94], // point of the icon which will correspond to marker's location
                                                            shadowAnchor: [4, 62],  // the same for the shadow
                                                            popupAnchor: [-25, -80]
                                                        }
                                                        )
                                                    ;

                                                </script>
                                                
                                                <?php
                                                   
                                                    
                                                    $sql = "SELECT c.Id_camion,c.id_tipo_contenedor,c.Matricula_camion,c.Latitud,c.Longitud,tp.Tipo_contenedor from Camion c,Tipo_contenedor tp where Id_camion = $id_camion ;";
                                                    
                                                    $result = mysqli_query($db, $sql);
                                                    
                                                    $resultCheck = mysqli_num_rows($result);
                                                    
                                                    if ($resultCheck > 0) {
                                                        
                                                        
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $Latitud = $row['Latitud'];
                                                            $Longitud = $row['Longitud'];
                                                            $Id_camion = $row['Id_camion'];
                                                            $Matricula_camion = $row['Matricula_camion'];
                                                            $id_tipo_contenedor = $row['id_tipo_contenedor'];
                                                            $Tipo_contenedor = $row['Tipo_contenedor'];
                                                            
                                                            echo "<script>L.marker([$Latitud, $Longitud],{icon: Camion})
                                                        .bindPopup('<b>Es el camión: $Matricula_camion</b> <br />Recoge los contenedores de: $Tipo_contenedor').openPopup().addTo(map);

                                                </script>";
                                                        }
                                                        
                                                        
                                                    }
                                                ?>
                                                <?php
                                                   
                                                    $sql = "SELECT Con.*,c.Color,tp.Tipo_contenedor,rc.Id_ruta from Contenedor Con,Color c,Tipo_contenedor tp,Ruta_Contenedor rc where Color_idColor = idColor and idTipo = id_tipo_contenedor and Id_ruta = $Id_ruta_servicio and id_tipo_contenedor=idTipo and Id_contenedor=Contenedor_id ";
                                                    
                                                    $result = mysqli_query($db, $sql);
                                                    
                                                    $resultCheck = mysqli_num_rows($result);
                                                    
                                                    if ($resultCheck > 0) {
                                                        
                                                        echo "<script>
                                                        var markerArray= []; </script>";
                                                        
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $Latitud = $row['Latitud'];
                                                            $Longitud = $row['Longitud'];
                                                            $Nombre = $row['Nombre'];
                                                            $Color = $row['Color'];
                                                            $Tipo_contenedor = $row['Tipo_contenedor'];
                                                            
                                                            
                                                            echo "<script>var container =L.marker([$Latitud, $Longitud],{icon: $Color})
                                                      .bindPopup('<b>Es un contenedor de: $Tipo_contenedor</b> <br />Es el contenedor $Nombre.').openPopup();
                                                        
                                                          markerArray.push(container);

                                                         </script>";
                                                         
                                                         
                                                        }
                                                        
                                                        echo "<script>
                                                        var group = L.featureGroup(markerArray).addTo(map);
                                                        
                                                        
                                                        map.fitBounds(group.getBounds());
                                                        </script>";
    
                                                       
    
    
                                                    }
                                                ?>
                                                <?php
                                                    
                                                    /*on ready y on change
    
                                                   Icono por defecto
                                                   L.marker([51.5, -0.09]).addTo(map)
                                                   .bindPopup('<b>Hello world!</b><br/>I am a popup.').openPopup();
                                                   */
                                                    
                                                    
                                                    $sql = "SELECT Nombre_archivo from Ruta rt where rt.Id_ruta = $Id_ruta_servicio;";
                                                    
                                                    $result = mysqli_query($db, $sql);
                                                    
                                                    $resultCheck = mysqli_num_rows($result);
                                                    
                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            
                                                            $Nombre_archivo = $row['Nombre_archivo'];
                                                            
                                                        }
                                                        echo "<script> var gpx = '../../Rutas/$Nombre_archivo';
                                                    new L.GPX(gpx, {async: true}).on('loaded', function(e) {
                                                        map.fitBounds(e.target.getBounds());
                                                    }).addTo(map);</script>";
                                                    
                                                    }
                                                
                                                
                                                ?>


                                                <script>
                                                    var popup = L.popup();

                                                    function onMapClick(e) {
                                                        popup
                                                            .setLatLng(e.latlng)
                                                            .setContent("You clicked the map at " + e.latlng.toString())
                                                            .openOn(map);
                                                    }

                                                    map.on('click', onMapClick);

                                                </script>


                                            </div>
                                        </div>


                                    </div>
                                </div><!-- .animated -->
                            </div><!-- .content -->
                            
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="clearfix"></div>
    
    <?php
        include "src/foot.html";
    ?>


</div><!-- /#right-panel -->


<!-- Script reducir el tamaño del menú de la izquierda -->
<?php
    include "src/Reducir_menu.html";
?>


</body>
</html>