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
    <title>MyGeoStop/Editar camión - Francisco Jurado Contreras</title>
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
                    <strong class="card-title">Editar Camion</strong>


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
                                                        <th>Matrícula_camión</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th>Latitud</th>
                                                        <th>Longitud</th>
                                                        <th>Tipo_contenedor</th>

                                                    </tr>
                                                    </thead>

                                                    <form method="post" action="Guardar_camion.php" name="formulario">

                                                        <?php
                         
                           //variables
                         //recibir id
                         $Id_camion = $_GET["Id_camion"];

                         $sql = "SELECT * FROM Camion where Id_camion=$Id_camion;"; 
                       
                         $result = mysqli_query($db, $sql);
                                  
                         $resultCheck = mysqli_num_rows($result);


                         while ($row = mysqli_fetch_assoc($result)){
                         
                                $Matricula_camion=$row['Matricula_camion'];
                                $Marca=$row['Marca'];
                                $Modelo=$row['Modelo'];
                                $id_tipo_contenedor=$row['id_tipo_contenedor'];
                                $Latitud = $row['Latitud'];
                                $Longitud = $row['Longitud'];
                                
                                
                         echo "<tr>";


                                                        echo "
                                                        <td><input type='text' name='Matricula_camion' required
                                                                   value='$row[Matricula_camion]'></td>";
                                                        echo "
                                                        <td><input type='text' name='Marca' required
                                                                   value='$row[Marca]'></td>";
                                                        echo "
                                                        <td><input type='text' name='Modelo' required
                                                                   value='$row[Modelo]'></td>";
                                                        echo "
                                                        <td><input type='text' name='Latitud' required
                                                                   value='$row[Latitud]'></td>";
                                                        echo "
                                                        <td><input type='text' name='Longitud' required
                                                                   value='$row[Longitud]'></td>";


                                                        }


                                                        echo/** @lang text */"
                                                        <td>
                                                            <label>

                                                                <select id='Tipos_contenedores' name='Tipo_contenedor'
                                                                        selected>";


                                                                    $sql ="SELECT * from Tipo_contenedor;";

                                                                    $result = mysqli_query($db, $sql);

                                                                    $resultCheck = mysqli_num_rows($result);

                                                                    if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                    $idTipo = $row['idTipo'];
                                                                    if ($idTipo == $id_tipo_contenedor){

                                                                    echo"
                                                                    <option name='Tipo_contenedor' value='$row[idTipo]'
                                                                            selected>$row[Tipo_contenedor]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    else{
                                                                    echo"
                                                                    <option name='Tipo_contenedor' value='$row[idTipo]'>
                                                                        $row[Tipo_contenedor]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    }

                                                                    }
                                                                    echo "</td>";
                                                      
                                                        echo "</tr>";

                                                        ?>
                                                </table>


                                                <br>

                                                <input type="hidden" name="Id_camion"
                                                       value="<?php echo $Id_camion ?>"/>
                                                <br>
                                                <a href="Camion.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Atras">Atrás</a>
                                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                                        name="Guardar" id="Guardar">Guardar</a></button>
                                                </form>
                                                

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
                                                var Camion = L.icon({
                                                        iconUrl: '../../assets/images/truck.png',
                                                            // shadowUrl: '../../assets/images/marker-icon-yellow.png',

                                                            iconSize: [30, 80], // size of the icon
                                                            shadowSize:[50, 64], // size of the shadow
                                                            iconAnchor:[40, 94], // point of the icon which will correspond to marker's location
                                                            shadowAnchor:[4, 62],  // the same for the shadow
                                                            popupAnchor:[-25, -80]
                                                    }
                                                    )
                                                    ;

                                                </script>
                                                
                                                <?php
                                                    
                                                    
                                                    if ($Id_camion != -1) {
                                                        
                                                        $sql = "SELECT c.Id_camion,c.id_tipo_contenedor,c.Matricula_camion,c.Latitud,c.Longitud,tp.Tipo_contenedor from Camion c,Tipo_contenedor tp where Id_camion = $Id_camion ;";
                                                        
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
                                                                
                                                                echo "<script>var container =L.marker([$Latitud, $Longitud],{icon: Camion})
                                                        .bindPopup('<b>Es el camión: $Matricula_camion</b> <br />Recoge los contenedores de: $Tipo_contenedor').openPopup().addTo(map);

                                                </script>";
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