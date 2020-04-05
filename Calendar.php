
<link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet'/>

<link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet'/>

<link href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' rel='stylesheet'/>

<script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>

<script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>

<script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>

<script src='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js'></script>

<link href='assets/css/Calendario.css' rel='stylesheet' type='text/css'><!--estilo calendario--->

<link href='assets/css/family.css' rel='stylesheet' type='text/css'>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> <!-- tiene que funcionar de alguna manera -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --este-->






<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><div id="modal-title"></div></h4>
            </div>
            <div class="modal-body">
                <div id="eventBodyModal"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                <a  id="eventLink" class="btn btn-info" >ir a </a>
                
            </div>
        </div>

    </div>
</div>



<script>

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid'],
            defaultView: 'dayGridMonth',
            defaultDate: '2019-11-07',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            
 

            events: [
                
                
                <?php
                $sql = "SELECT c.Color,s.id_servicio,s.Nombre_servicio,U.Nombre_y_apellido,ca.Matricula_camion,R.Nombre_ruta,s.Fecha_inicio,s.Fecha_fin from Tipo_contenedor tc,Servicio s,Camion ca,Ruta R,Usuario U,Color c where s.Id_usuario=U.id_usuario and ca.Id_camion=s.Id_camion and R.Id_ruta=s.Id_ruta and Color_id = idColor and Tipo_id_cont = idTipo;";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo "
                {
                    
                     id: '$row[id_servicio]',
                     title: 'Servicio: $row[Nombre_servicio]',
                     description: 'El empleado encargado de este servicio es: $row[Nombre_y_apellido]' +'<br>' +
                    'La matricula del camión es la: $row[Matricula_camion]',
                     start: '$row[Fecha_inicio]',
                     end: '$row[Fecha_fin]',
                     backgroundColor: '$row[Color]'
                    
                },
                
                
                ";
                    }
                }?>
            ],

            eventClick: function events(calEvent) {
                
                $("#eventIdModal").html(calEvent.event.id);
                $("#eventBodyModal").html(calEvent.event._def.extendedProps.description);
                $('#modal-title').html(calEvent.event.title);
                $("#eventLink").attr('href', "Editar_servicio.php?id_servicio="+calEvent.event.id);
               // alert( calEvent.event.id);
                
                $('#myModal').modal('show');

            }


            //funciona


        });

        calendar.render();
    });

</script>
