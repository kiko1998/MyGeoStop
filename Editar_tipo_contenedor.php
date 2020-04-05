<?php 
 include "src/session_start.php";
 include "config/conexion.php";
 include "config/server.php";

?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Editar tipo contenedor - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html";
    ?>

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
                        <strong class="card-title">Editar tipos de contenedor</strong>

                         
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
                                            <th>Color</th>
                                        </tr>
                                    </thead>

                          <form method="post" action="Guardar_tipo_contenedor.php" name="formulario" >

                         <?php
                         
                         //recibir id
                         $idTipo = $_GET["idTipo"];

                          $sql ="SELECT Color,Color_id from Tipo_contenedor t,Color c WHERE idTipo = $idTipo and idColor = Color_id " ;

                         
                           $result = mysqli_query($db, $sql);
                           
                           $resultCheck = mysqli_num_rows($result);
                         
                          while ($row = mysqli_fetch_assoc($result)){

                           
                           $Color_id=$row['Color_id'];
                           
                  }
                         
                         
                         
                         
                         
                         
                         $sql = "SELECT * FROM Tipo_contenedor where idTipo=$idTipo;"; 
                       
                         $result = mysqli_query($db, $sql);
                                  
                         $resultCheck = mysqli_num_rows($result);


                         while ($row = mysqli_fetch_assoc($result)){
                         
                         
                         echo "<tr>";


                       echo "<td><input type='text' name='Tipo_contenedor' required value='$row[Tipo_contenedor]' ></td>";
                       
                   }
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

                                     if ($idColor == $Color_id){
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

                         echo "</tr>";


                         ?>
                       </table>
                                                                         
                              

                        
                          <br>
                          
                         <input type="hidden"  name="idTipo" value="<?php echo $idTipo ?>"  ></input>
                         <br>
                        <a href="Tipos_contenedores.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar" id ="Guardar" >Guardar</a></button>
                          
                          </form>


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
    include"src/foot.html";
    ?> 


    </div><!-- /#right-panel -->

   

    <!-- Script reducir el tamaño del menú de la izquierda -->
    <?php
    include "src/Reducir_menu.html";
    ?>


</body>
</html>