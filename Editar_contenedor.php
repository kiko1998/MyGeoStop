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
    <title>MyGeoStop/Editar contenedor - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        include "src/Estilos.html";
    ?>
</head>
<body>
  <span id="chromeFix">
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
              <strong class="card-title">Editar contenedor</strong>
            </div>
            <div class="card-body">
              <div class="fontawesome-icon-list">
                
                <div class="content">
                  
                  <div class="animated fadeIn">
                    
                    <div class="row">
                      <div class="col-md-12">
                        
                        <div class="card">
                          
                          <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Nombre</th>
                                  <th>Latitud </th>
                                  <th>Longitud</th>
                                  <th>Estado</th>
                                  <th>Tipo</th>
                                  <th>Color</th>
                                  <th>Novedoso</th>
                                </tr>
                              </thead>
                              <form method="post" action="Guardar_contenedor.php" name="formulario">
                                <?php
                                
                                //recibir valores del anterior formulario
                                $Id_contenedor = $_GET["Id_contenedor"];
                                
                                
                                //Consulta
                                $sql ="SELECT Id_contenedor,e.id_estado, Nombre, Latitud, Longitud,Tipo_contenedor,id_tipo_contenedor,Color,Color_idColor,Estado, Operativo,c.Novedoso_id_Novedoso from Contenedor c,Tipo_contenedor t,Color, Estado_contenedor e,Novedoso n WHERE c.id_tipo_contenedor = t.idTipo and Id_contenedor = $Id_contenedor and idColor = Color_idColor and c.id_estado=e.id_estado and Novedoso_id_Novedoso=id_Novedoso " ;
                                $result = mysqli_query($db, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                
                                
                                echo "<tr>";
                                while ($row = mysqli_fetch_assoc($result)){
                                $id_tipo_contenedor=$row['id_tipo_contenedor'];
                                $Color_idColor=$row['Color_idColor'];
                                $id_estado=$row['id_estado'];
                                $Novedoso_id_Novedoso=$row['Novedoso_id_Novedoso'];
                                echo "
                                <td><input type='text' name='Nombre' required value='$row[Nombre]'></td>
                                <td><input type='text' name='Latitud' required value='$row[Latitud]'></td>
                                <td><input type='text' name='Longitud' required value='$row[Longitud]'></td>
                                ";
                                }
                                //Consulta para el estado
                                echo"
                                <td>
                                    <label name='Estado'>
                                        <select id='Estado' name='Estado' selected>";


                                            $sql ="SELECT * from Estado_contenedor;";

                                            $result = mysqli_query($db, $sql);

                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0) {
                                            while ($row = mysqli_fetch_assoc($result)){
                                            $e_id_estado = $row['id_estado'];
                                            if ($e_id_estado == $id_estado){
                                            echo"
                                            <option name='Estado' value='$row[id_estado]' selected>$row[Estado]</option>
                                            ";
                                            }
                                            else{
                                            echo"
                                            <option name='Tipo_contenedor' value='$row[id_estado]'>$row[Estado]</option>
                                            ";
                                            }

                                            }

                                            }
                                            echo "</td>
                                ";

                                //Consulta para el desplegable Tipo_contenedor
                                echo"
                                <td>
                                    <label name='Tipos_contenedor'>
                                        <select id='Tipos_de_contenedores' name='Tipo_contenedor' selected>";


                                            $sql ="SELECT * from Tipo_contenedor;";

                                            $result = mysqli_query($db, $sql);

                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0) {
                                            while ($row = mysqli_fetch_assoc($result)){
                                            $idTipo = $row['idTipo'];

                                            if ($idTipo == $id_tipo_contenedor){
                                            echo"
                                            <option name='Tipo_contenedor' value='$row[idTipo]' selected>
                                                $row[Tipo_contenedor]
                                            </option>
                                            ";
                                            }
                                            else{
                                            echo"
                                            <option name='Tipo_contenedor' value='$row[idTipo]'>$row[Tipo_contenedor]
                                            </option>
                                            ";
                                            }

                                            }

                                            }
                                            echo "</td>";
                                // Desplegable color
                                echo"
                                <td>
                                    <label name='Color'>
                                        <select id='Color' name='Color' selected>";

                                            $sql ="SELECT * from Color;";

                                            $result = mysqli_query($db, $sql);

                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0) {
                                            while ($row = mysqli_fetch_assoc($result)){
                                            $idColor = $row['idColor'];

                                            if ($idColor == $Color_idColor){
                                            echo"
                                            <option name='Color' value='$row[idColor]' selected>$row[Color]</option>
                                            ";
                                            }
                                            else{
                                            echo"
                                            <option name='Color' value='$row[idColor]'>$row[Color]</option>
                                            ";
                                            }

                                            }

                                            }
                                            echo "</td>";

                                //Novedoso

                                //variables
                                //recibir id
                                echo"
                                <td>
                                    <label name='Novedoso'>
                                        <select id='Novedoso' name='Novedoso' selected>";
                                            $sql ="SELECT id_Novedoso,IF(Novedoso=1, 'Sí','No') Novedoso from
                                            Novedoso;";

                                            $result = mysqli_query($db, $sql);

                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0) {
                                            while ($row = mysqli_fetch_assoc($result)){
                                            $id_Novedoso = $row['id_Novedoso'];

                                            if ($id_Novedoso == $Novedoso_id_Novedoso){
                                            echo"
                                            <option name='Novedoso' value='$row[id_Novedoso]' selected>$row[Novedoso]
                                            </option>
                                            ";
                                            }
                                            else{
                                            echo"
                                            <option name='Novedoso' value='$row[id_Novedoso]'>$row[Novedoso]</option>
                                            ";
                                            }

                                            }

                                            }
                                            echo "</td>";
                                echo "</tr>";
                                ?>
                                              </table>
                                              
                                              
                                              
                                              <br>
                                              
                                              <input type="hidden" name="Id_contenedor"
                                                     value="<?php echo $Id_contenedor ?>"/>
                                              <br>
                                            <a href="Contenedores.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>

                                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                                    name="Guardar" id="Guardar">Guardar</a></button>

                                          <br>
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
                          </span>
</body>
</html>