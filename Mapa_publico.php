<?php
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
    <title>MyGeoStop/Tipos de contenedores - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/tipo_cont.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href='assets/css/family.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/css/leaflet.css"/>

    <script src="assets/js/leaflet.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->


</head>
<body>
<!-- Menú-->


<!-- Menú  -->

<!-- Right Panel -->


<div id="right-panel-map-public" class="right-panel">

    <!-- Header-->

    <form method="post" action="Mapa_publico.php" name="formulario">
        <img src="assets/images/logo.png" alt="Logo" class="logo-mapa">


        <label class="label-mapa">Contenedores que se quieren mostrar:


            <select class='mapa_desplegable' name='Tipo_contenedor' selected>

        </label>

        <!--<div class="d-inline-flex btn-group login-menu">
             <a class="btn btn-outline-secondary" href="page-register.php">Registrarse</a>
        
        </div>
        -->
        <?php
            
            $sql = "SELECT * from Tipo_contenedor;";
            
            $result = mysqli_query($db, $sql);
            
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    $idTipo = $row['idTipo'];
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    } else {
                        $id = -1;
                    }
                    
                    if ($idTipo == $id) {
                        echo "<option name='Tipo_contenedor' value='Mapa_publico.php?id=$row[idTipo]' selected>$row[Tipo_contenedor]</option>";
                        
                        
                    } else {
                        echo "<option name='Tipo_contenedor' value='Mapa_publico.php?id=$row[idTipo]'>$row[Tipo_contenedor]</option>";
                    }
                    
                }
                
            }
            if ($id == -1 || $id == '') {
                echo "<option name='All_contenedores' value ='Mapa_publico.php?id=-1' selected>Todos</option>";
            } else {
                echo "<option name='All_contenedores' value ='Mapa_publico.php?id=-1'>Todos</option>";
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

    <a class="iniciar-sesion-map" href="page-login.php">Iniciar sesión</a>

    <div id="mapid" style="width: 100%; height: 790px;"></div>

    <script>


        var map = L.map('mapid').setView([37, -3], 50);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            minZoom: -2000,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }).addTo(map);

        /*
         on ready y on change

         Icono por defecto
          L.marker([51.5, -0.09]).addTo(map)
         .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
         */


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

        /* var fg2=L.featureGroup([Verde,Azul,Amarillo,Rojo,Negro]);

          map.fitBounds(fg2.getBounds());
        */
        /*


          Icono negro
          var Negro = L.icon({
            iconUrl: '../../assets/images/marker-icon-black.png',
           // shadowUrl: '../../assets/images/marker-icon-yellow.png',

            iconSize:     [30, 30], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [40, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-25, -80] // point from which the popup should open relative to the iconAnchor
          });

           var fg = L.featureGroup([Negro,Rojo,Verde,Azul,Amarillo].addTo(map));
            document.getElementById("whereToPrint").innerHTML = JSON.stringify(fg, null, 4);       //map.fitBounds(fg.getBounds());



        document.addEventListener("DOMContentLoaded", function(event) {
        */
    </script>
    
    
    <?php
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if ($id == -1 || empty($_GET['id'])) {
            
            $sql = "SELECT Con.*,c.Color,tp.Tipo_contenedor,ec.Estado from Contenedor Con,Color c,Tipo_contenedor tp,Estado_contenedor ec where Color_idColor = idColor and idTipo = id_tipo_contenedor and Con.id_estado = ec.id_estado;";
            
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
                    $Estado = $row['Estado'];
                    
                    echo "<script>var container = L.marker([$Latitud, $Longitud],{icon: $Color})
          .bindPopup('<b>Es un contenedor de: $Tipo_contenedor</b> <br />Es el contenedor $Nombre.<br>Estado: $Estado').openPopup();

                  markerArray.push(container); </script>";
                    
                    
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
            
            $idTipo = $_GET["id"];
            
            
        } else {
            $idTipo = -1;
        }
        
        if ($idTipo != -1) {
            
            
            $sql = "SELECT Con.*,c.Color,tp.Tipo_contenedor,ec.Estado from Contenedor Con,Color c,Tipo_contenedor tp,Estado_contenedor ec where id_tipo_contenedor = $idTipo and Color_idColor = idColor and idTipo = id_tipo_contenedor and ec.id_estado = Con.id_estado; ";
            
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
                    $Estado = $row['Estado'];
                    
                    
                    echo "<script>var container =L.marker([$Latitud, $Longitud],{icon: $Color})
                                                      .bindPopup('<b>Es un contenedor de: $Tipo_contenedor</b> <br>Es el contenedor $Nombre.<br> Estado: $Estado').openPopup();
                                                        
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


</div>


</body>
</html>