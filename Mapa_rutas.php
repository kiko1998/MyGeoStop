<?php
    include "src/session_start.php";
    include "config/conexion.php";
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
    <title>MyGeoStop/Mapa rutas - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include "src/Estilos.html"
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

<?php include "src/menu.php";
?>


<!-- Menú  -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php
        include "head.php";
    ?>


    <div class="content-map">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Mapa rutas</strong>
                </div>
                <div class="card-body">

                    <div class="fontawesome-icon-list">
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">

                                            <form method="post" action="Mapa_contenedores.php" name="formulario">

                                                <label> Rutas que se quieren mostrar:

                                                    <select class='mapa_desplegable' name='Ruta' selected>

                                                </label>
                                                
                                                <?php
                                                    
                                                    $sql = "SELECT * from Ruta;";
                                                    
                                                    $result = mysqli_query($db, $sql);
                                                    
                                                    $resultCheck = mysqli_num_rows($result);
                                                    
                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            
                                                            $Id_ruta = $row['Id_ruta'];
                                                            if (isset($_GET['id'])) {
                                                                $id = $_GET['id'];
                                                            } else {
                                                                $id = -1;
                                                            }
                                                            
                                                            if ($Id_ruta == $id) {
                                                                echo "<option name='Ruta' value='Mapa_rutas.php?id=$row[Id_ruta]' selected>$row[Nombre_ruta]</option>";
                                                                
                                                                
                                                            } else {
                                                                echo "<option name='Ruta' value='Mapa_rutas.php?id=$row[Id_ruta]'>$row[Nombre_ruta]</option>";
                                                            }
                                                            
                                                        }
                                                        
                                                    }
                                                    if ($id == -1 || $id == '') {
                                                        echo "<option name='Todas_ruta' value ='Mapa_rutas.php?id=-1' selected>Todas</option>";
                                                    } else {
                                                        echo "<option name='Todas_ruta' value ='Mapa_rutas.php?id=-1'>Todas</option>";
                                                    }
                                                    
                                                    
                                                    echo "</select>";
                                                ?>
                                            </form>

                                            <script>
                                                $(document).ready(function () {

                                                    $('.mapa_desplegable').change(function () {
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
                                                /*
                                            on ready y on change

                                            Icono por defecto
                                             L.marker([51.5, -0.09]).addTo(map)
                                            .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
                                            */
                                                if (isset($_GET["id"])) {
                                                    $Id_ruta = $_GET["id"];
                                                    
                                                    
                                                    $sql = "SELECT Nombre_archivo from Ruta rt where rt.Id_ruta = $Id_ruta;";
                                                    
                                                    $result = mysqli_query($db, $sql);
                                                    
                                                    $resultCheck = mysqli_num_rows($result);
                                                    
                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            
                                                            $Nombre_archivo = $row['Nombre_archivo'];
                                                            
                                                        }
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
                                                var Pink = L.icon({
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
                                                
                                                if (isset($_GET['id'])) {
                                                    $id = $_GET['id'];
                                                }
                                                if ($id == -1 || empty($_GET['id'])) {
                                                    
                                                    $sql = "SELECT Con.*,rc.*,rt.*,c.Color,tp.Tipo_contenedor from Contenedor Con,Color c,Tipo_contenedor tp,Ruta_Contenedor rc, Ruta rt where Color_idColor = idColor and idTipo = id_tipo_contenedor and rc.Id_ruta = rt.Id_ruta and Contenedor_id = Id_contenedor  ;";
                                                    
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
                                                            
                                                            
                                                            echo "<script>var container = L.marker([$Latitud, $Longitud],{icon: $Color})
          .bindPopup('<b>Es un contenedor de: $Tipo_contenedor</b> <br />Es el contenedor $Nombre.').openPopup();

                                                     markerArray.push(container);                                                                                                              
                                                    </script>";
                                                        
                                                        
                                                        }
                                                        echo "<script>
                                                        var group = L.featureGroup(markerArray).addTo(map);
                                                        map.fitBounds(group.getBounds());
                                                        </script>";
                                                    }
                                                    
                                                }
                                            ?>
                                            
                                            <?php
                                                
                                                if (isset($_GET["id"])) {
                                                    
                                                    $Id_ruta = $_GET["id"];
                                                    
                                                    
                                                } else {
                                                    $Id_ruta = -1;
                                                }
                                                
                                                if ($Id_ruta != -1) {
                                                    
                                                    
                                                    $sql = "SELECT Con.*,rc.*,rt.*,c.Color,tp.Tipo_contenedor from Contenedor Con,Color c,Tipo_contenedor tp,Ruta_Contenedor rc, Ruta rt where rt.Id_ruta = $Id_ruta and Color_idColor = idColor and idTipo = id_tipo_contenedor and rc.Id_ruta = rt.Id_ruta and Contenedor_id = Id_contenedor  ;";
                                                    
                                                    $result = mysqli_query($db, $sql);
                                                    
                                                    $resultCheck = mysqli_num_rows($result);
                                                    
                                                    if ($resultCheck > 1) {
                                                        
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


                                                L.circle([51.508, -0.11], 500, {
                                                    color: 'red',
                                                    fillColor: '#f03',
                                                    fillOpacity: 0.5
                                                }).addTo(map).bindPopup("I am a circle.");

                                                L.polygon([
                                                    [51.509, -0.08],
                                                    [51.503, -0.06],
                                                    [51.51, -0.047]
                                                ]).addTo(map).bindPopup("I am a polygon.");


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


<!-- /#right-panel -->


<!-- Script reducir el tamaño del menú de la izquierda -->
<?php
    include "src/Reducir_menu.html";
?>


</body>
</html>