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
    <title>MyGeoStop/Editar tipo ruta - Francisco Jurado Contreras</title>
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


    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Editar ruta</strong>


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
                                                        <th>Ruta</th>
                                                        <th>Tipo contenedor que recoge esta ruta</th>
                                                        <th>Sube una ruta</th>

                                                    </tr>
                                                    </thead>

                                                    <form method="post" action="Guardar_ruta.php" name="formulario"
                                                          enctype="multipart/form-data">

                                                        <?php
                                                            
                                                            //variables
                                                            //recibir id
                                                            $Id_ruta = $_GET["Id_ruta"];
                                                            
                                                            $sql = "SELECT r.*,t.Tipo_contenedor FROM Ruta r,Tipo_contenedor t where Id_ruta=$Id_ruta and idTipo = Tipo_id_cont;";
                                                            
                                                            
                                                            $result = mysqli_query($db, $sql);
                                                            
                                                            $resultCheck = mysqli_num_rows($result);
                                                            
                                                            
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $Tipo_id_cont = $row['Tipo_id_cont'];
                                                                
                                                                echo "<tr>";


                                                        echo "
                                                        <td><input type='text' name='Nombre_ruta' required
                                                                   value='$row[Nombre_ruta]'></td>";


                                                        echo "
                                                        <td>
                                                            <label name='Tipo_contenedor'>

                                                                <select id='Id_tipo_contenedor'
                                                                        name='Id_tipo_contenedor' selected>";


                                                                    $sql = "SELECT * from Tipo_contenedor;";

                                                                    $result = mysqli_query($db, $sql);

                                                                    $resultCheck = mysqli_num_rows($result);

                                                                    if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                                    $idTipo = $row['idTipo'];
                                                                    $Tipo_contenedor = $row['Tipo_contenedor'];
                                                                    if ($Tipo_id_cont == $idTipo) {
                                                                    echo "
                                                                    <option name='Id_tipo' value='$idTipo'
                                                                            selected>$Tipo_contenedor
                                                                    </option>
                                                                    ";
                                                                    } else {
                                                                    echo "
                                                                    <option name='Id_tipo' value='$idTipo'>
                                                                        $Tipo_contenedor
                                                                    </option>
                                                                    ";

                                                                    }


                                                                    }
                                                                    }
                                                                    echo "</td>
                                                        <td>
                                                            <input type='file' name='Ruta'>

                                                        </td>";
                                                        }

                                                        ?>
                                                </table>


                                                <br>

                                                <input type="hidden" name="Id_ruta"
                                                       value="<?php echo $Id_ruta ?>"/>

                                                <a href="Ruta.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>

                                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                                        name="Guardar" id="Guardar">Guardar</a></button>
                                                </form>

                                                <script>
                                                    $(document).ready(function () {

                                                        $('#Rutas').change(function () {
                                                            window.location = this.value;
                                                        });
                                                    });


                                                </script>

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
                                                    $Id_ruta = $_GET["Id_ruta"];
                                                    
                                                    $sql = "SELECT Nombre_archivo from Ruta rt where rt.Id_ruta = $Id_ruta;";
                                                    
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
                                                    var Black = L.icon({
                                                        iconUrl: '../../assets/images/marker-icon-pink.png',
                                                        // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                        iconSize: [30, 30], // size of the icon
                                                        shadowSize: [50, 64], // size of the shadow
                                                        iconAnchor: [40, 94], // point of the icon which will correspond to marker's location
                                                        shadowAnchor: [4, 62],  // the same for the shadow
                                                        popupAnchor: [-25, -80] // point from which the popup should open relative to the iconAnchor
                                                    });


                                                </script>
                                                
                                                <?php
                                                    
                                                    
                                                    if ($Id_ruta != -1) {
                                                        
                                                        $sql = "SELECT Con.*,rc.*,rt.*,c.Color,tp.Tipo_contenedor from Contenedor Con,Color c,Tipo_contenedor tp,Ruta_Contenedor rc, Ruta rt where rt.Id_ruta = $Id_ruta and Color_idColor = idColor and idTipo = id_tipo_contenedor and rc.Id_ruta = rt.Id_ruta and Contenedor_id = Id_contenedor  ;";
                                                        
                                                        $result = mysqli_query($db, $sql);
                                                        
                                                        $resultCheck = mysqli_num_rows($result);
                                                        
                                                        if ($resultCheck > 1) {
                                                            
                                                            echo "<script> var markerArray= []; </script>";
                                                            
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
                                                        
                                                        
                                                        } else if ($resultCheck === 1) {
                                                            
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $Latitud = $row['Latitud'];
                                                                $Longitud = $row['Longitud'];
                                                                $Nombre = $row['Nombre'];
                                                                $Color = $row['Color'];
                                                                $Tipo_contenedor = $row['Tipo_contenedor'];
                                                                
                                                                echo "<script>var container =L.marker([$Latitud, $Longitud],{icon: $Color})
                                                        .bindPopup('<b>Es un contenedor de: $Tipo_contenedor</b> <br />Es el contenedor $Nombre.').openPopup().addTo(map);</script>";
                                                            
                                                            }
                                                        }
                                                        
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


                                </div>
                            </div><!-- .animated -->
                        </div><!-- .content -->


                    </div>

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