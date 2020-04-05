<?php
 include "src/session_start.php";
 include "config/conexion.php";
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Servicio - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1", shrink-to-fit=no">
    
    <?php
        include "src/Estilos.html";
        include "Calendar.php";
    ?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script>
        function confirmDelete() {
            if (confirm("¿Estás seguro de que quieres eliminar este contenedor?") === true) {
                alert("Contenedor eliminado");
                return true;
            } else {
                alert("Operación cancelada");
                return false;
            }
        }
    </script>
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


    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Servicio</strong>

                    <div class="tab">
                        <button class="tablinks" onclick="openCalendar(event, 'Calendario')" id="defaultOpen">
                            Calendario
                        </button>
                        <button class="tablinks" onclick="openCalendar(event, 'Servicio')">Servicio</button>
                        
                    </div>
                    
                    <div id='Calendario' class="tabcontent">
                        <div id="calendar">
                    </div>
                    </div>
                  
                    
                    <div id="Servicio" class="tabcontent">

                    <button type="añadir" class='button2' name="añadir" id="Añadir_servicio"><a
                                    href="Crear_servicio.php"
                                    id="Añadir"> Añadir</a></button>
                        
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
                                                            <th>Nombre Servicio</th>
                                                            <th>Nombre y apellido</th>
                                                            <th>Matrícula camión</th>
                                                            <th>Ruta</th>
                                                            <th>Fecha inicio</th>
                                                            <th>Fecha fin</th>
                                                            <th>Editar</th>
                                                            <th>Eliminar</th>
                                                        </tr>
                                                        </thead>
                                                        
                                                        <?php
                                                            
                                                            //Mostrar contenedores
                                                            
                                                            $sql = "SELECT s.id_servicio,s.Nombre_servicio,U.Nombre_y_apellido,c.Matricula_camion,R.Nombre_ruta,s.Fecha_inicio,s.Fecha_fin from Servicio s,Camion c,Ruta R,Usuario U where s.Id_usuario=U.id_usuario and c.Id_camion=s.Id_camion and R.Id_ruta=s.Id_ruta ;";
                                                            $result = mysqli_query($db, $sql);
                                                            $resultCheck = mysqli_num_rows($result);
                                                            
                                                            if ($resultCheck > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    echo "<tr>";
                                                                    echo "<td>$row[Nombre_servicio]</td>";
                                                                    echo "<td>$row[Nombre_y_apellido]</td>";
                                                                    echo "<td>$row[Matricula_camion]</td>";
                                                                    echo "<td>$row[Nombre_ruta]</td>";
                                                                    echo "<td>$row[Fecha_inicio]</td>";
                                                                    echo "<td>$row[Fecha_fin]</td>";
                                                                    echo "<td>
                                       <button type='editar' class='button' name='editar'><a href=Editar_servicio.php?id_servicio=$row[id_servicio] id='Editar'>Editar</a></button>
                                 </td>
                                 ";
                                                                    
                                                                    
                                                                    echo "
                                <td> <button type='submit' class='button1' name='eliminar' ><a href=Eliminar_servicio.php?id_servicio=$row[id_servicio] id = 'Eliminar' onclick='return confirmDelete()'> Eliminar</a></td>";
                                                                
                                                                
                                                                }
                                                                
                                                            }
                                                        
                                                        ?>
                                                    </table>


                                                </div>
                                            </div>
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
<script>
    function openCalendar(evt, Calendario) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(Calendario).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>


<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>