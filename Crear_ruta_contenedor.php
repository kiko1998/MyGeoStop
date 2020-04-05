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
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>MyGeoStop/Ruta Contenedor - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include "src/Estilos.html";
    ?>
</head>
<body>
<!-- Menú-->
<?php
    include("src/menu.php")
?>
<div id="right-panel" class="right-panel">
    <?php include("head.php")
    ?>
    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Añadir un nuevo contenedor a la ruta</strong>


                </div>


                <div class="card-body">

                    <div class="fontawesome-icon-list">

                        <form method="POST">
                            <label class="label"> Contenedores que puedes añadir:</label>
                            <?php
                                if (isset($_POST['Guardar'])) {
                                    $Id_ruta = $_GET["Id_ruta"];
                                    
                                    $query_delete = "DELETE FROM Ruta_Contenedor where Id_ruta = $Id_ruta";
                                    
                                    $result_delete = utf8_encode(mysqli_query($db, $query_delete));
                                    
                                    //$user_delete = mysqli_fetch_assoc($result_delete);
                                    
                                    //Mostrar (t)odo lo que devuelve el post
                                    
                                    for ($i = 0; $i < count($_POST['Contenedor']); $i++) {
                                        $Contenedor = $_POST['Contenedor'][$i];
                                        
                                        $C_id = mysqli_real_escape_string($db, $Contenedor);
                                        
                                        $query = "INSERT INTO Ruta_Contenedor (Id_ruta, Contenedor_id) VALUES ('$Id_ruta','$C_id')";
                                        
                                        $result = utf8_encode(mysqli_query($db, $query));
                                        
                                        
                                        
                                    }
                                    if (isset($result)) {
                                        if ($result == false) {
                                            echo '<p>Error al modificar los campos en la tabla.</p>';
                                        } else {
                                            echo '<p>Campo modificado correctamente</p>';
                                        }
                                    }
                                    
                                }
                            ?>
                            <?php
                                $Id_ruta = $_GET["Id_ruta"];
                                //Ruta contenedores
                                $sql = "SELECT c.Id_contenedor,c.Nombre from Contenedor c,Ruta r where r.Tipo_id_cont = c.id_tipo_contenedor and Id_ruta = $Id_ruta";
                                //SELECT `Id_contenedor`, `Nombre` FROM `Contenedor`,Ruta where id_tipo_contenedor = Tipo_id_cont and Id_ruta = 2
                                $result = mysqli_query($db, $sql);
                                
                                $resultCheck = mysqli_num_rows($result);
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    
                                    $Id_contenedor = $row['Id_contenedor'];
                                    
                                    $Nombre_n = $row['Nombre'];
                                    
                                    $Id_ruta = $_GET["Id_ruta"];
                                    
                                    //Contenedor que se quiere añadir
                                    $sqlItem = "SELECT r.Id_ruta,r.Contenedor_id,c.Nombre from Ruta_Contenedor r, Contenedor c  where r.Id_ruta = $Id_ruta and Id_contenedor=Contenedor_id";
                                    
                                    $resultItem = mysqli_query($db, $sqlItem);
                                    
                                    $resultCheckItem = mysqli_num_rows($resultItem);
                                    
                                    
                                    $pintado = false;
                                    
                                    while ($rowItem = mysqli_fetch_assoc($resultItem)) {
                                        
                                        
                                        $Contenedor_id = $rowItem['Contenedor_id'];
                                        
                                        $Nombre = $rowItem['Nombre'];
                                        
                                        if ($Id_contenedor == $Contenedor_id) {
                                            
                                            //Al estar chekeado lo manda a la BBDD para insertarlo en la tabla por eso el nombre de este input no se mete en la base de datos
                                            echo "<br><label class='label'><input type='checkbox' name='Contenedor[]' value='$Id_contenedor' checked>$Nombre </label>";
                                            $pintado = true;
                                        }
                                        
                                    }//While
                                    
                                    if ($pintado == false) {
                                        echo "<br><label class='label'><input type='checkbox' name='Contenedor[]' value='$Id_contenedor'>$Nombre_n </label>";
                                        
                                    }
                                    
                                    
                                }//while
                            ?>
                            <br>
                            <a href="Ruta_contenedor.php?Id_ruta=<?php echo $Id_ruta; ?>" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>
                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar"
                                    id="Guardar">Guardar
                            </button>
                            <br>


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