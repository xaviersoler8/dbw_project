<?php

session_start();

if(!isset($_SESSION['user'])){
        echo '
        <script>
                alert("Please, connect session");
                window.location = "login.php";
        </script>
        ';
        session_destroy();
        die();
}

require_once('core/connection.php');
/**Consulta para Traer Todos los Eventos */
$sqlAllEvents = "SELECT id, title, start, end, color FROM eventos ";
/**Preparamos la Consulta */
$result = $dbConn->prepare($sqlAllEvents);
/**Ejecutamos la Consulta */
$result->execute();
/**Guardamos Todos los Eventos */
$events = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="../experiments.css" rel="stylesheet">
  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../js/scriptbutton.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- Incluimos Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Incluimos FullCalendar CSS -->
    <link href='css/fullcalendar.css' rel='stylesheet' />
    <!-- CSS Mod -->
    <style>

        #calendar {
            max-width: 800px;
        }

        .col-centered {
            float: none;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!--HEADER--> 

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
  <a class="navbar-brand" href="index.html" ><img width=50 src ="../img/logo4.png" > MyLab</a>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <!-- experiments -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item active">
        <a class="nav-link" href="../experiments.php"><img width=30 src ="../img/exp_icon.png"></a>
      </li>
    </div>
    <!-- stock -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="../stock.php"><img width=30 src ="../img/stock_icon.png"></a>
      </li>
    </div>
    <!-- calendar -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
          <a class="nav-link" href="index.php"><img width=30 src ="../img/cal_icon.png"></a>
        </li>
    </div>
    <!-- chat -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="../chat_1.php"><img width=30 src ="../img/chat_icon.png"></a>
      </li>
    </div>
    <!-- profile -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="../profile.php"><img width=30 src ="../img/prof_icon.png"></a>
      </li>
    </div>
  </div>
</nav>

    <!-- Contenido de la Pagina -->
    <!--container -->
    <div class="container" style="padding-top:35px">
        <!-- Calendario -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Calendar</h1>
                <div id="calendar" class="col-centered">
                </div>
            </div>
        </div>
        <!-- /Calendario -->
        <!-- Modal Nuevo Evento -->
        <div class="modal fade" id="newEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="core/newEvent.php">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">New Event</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Color</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Select Color</option>
                                        <option style="color:#159E4A;" value="#159E4A">&#9724;Green</option>
                                        <option style="color:#FFD700;" value="#FFD700">&#9724;Yellow</option>
                                        <option style="color:#FF8C00;" value="#FF8C00">&#9724;Orange</option>
                                        <option style="color:#FF0000;" value="#FF0000">&#9724;Red</option>
                                        <option style="color:#000;" value="#000">&#9724;Black</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start" class="col-sm-10 control-label">Start Date and Hour</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end" class="col-sm-10 control-label">End Date and Hour</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal Nuevo Evento -->
        <!-- Modal Editar Titulo o Eliminar Evento -->
        <div class="modal fade" id="editDeleteEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="core/editTitleDeleteEvent.php">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Title or Delete Event</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Color</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Select Color</option>
                                        <option style="color:#159E4A;" value="#159E4A">&#9724;Green</option>
                                        <option style="color:#FFD700;" value="#FFD700">&#9724;Yellow</option>
                                        <option style="color:#FF8C00;" value="#FF8C00">&#9724;Orange</option>
                                        <option style="color:#FF0000;" value="#FF0000">&#9724;Red</option>
                                        <option style="color:#000;" value="#000">&#9724;Black</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label class="text-danger"><input type="checkbox" name="delete"> Delete Events</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Mandamos el id del Evento para poder editarlo -->
                            <input type="hidden" name="id" class="form-control" id="id">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal Editar Titulo o Eliminar Evento -->
        <!-- Modal Cambios -->
        <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="core/editTitleDeleteEvent.php">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">¡Oye!</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-10" id="result">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal Cambios -->
    </div>
    <!-- /container -->
    <!-- Incluimos Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Incluimos FullCalendar JS -->
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.js'></script>
    <!-- <script src='js/fullcalendar/locale/es.js'></script> -->

    <!-- FullCalendar Funciones-->
    <script>
        $(document).ready(function() {
            /**Alguna Variables con la Fecha que vamos a Usar mas Adelante */
            var date = new Date(); //Fecha Completa
            var yyyy = date.getFullYear().toString(); //Solo el Año
            var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString(); //Solo el Mes
            var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString(); //Solo el Dia

            $('#calendar').fullCalendar({
                columnFormat: 'dddd', //Nombre Completo de los Dias.
                firstDay: 0, //Para que comience en Domingo la semana
                header: {
                    language: 'english', //Lenguaje en INgles
                    left: 'prev,next today', //Opciones de Menus para avanzar o ir al Dia Actual
                    center: 'title',
                    right: 'month,basicWeek,basicDay' //Mas Opciones de Menus para cambiar de Vistas
                },
                /**Colores distintos para el fin de Semana */
                businessHours: {
                    dow: [1, 2, 3, 4, 5] // dias de semana, 0=Domingo
                },
                displayEventTime: false, //NO Mostrar la Hora
                defaultDate: yyyy + "-" + mm + "-" + dd,
                editable: true,
                eventLimit: false, //esta en false para que muestre todos los eventos y no el link mas
                selectable: true,
                selectHelper: true,
                /**Nuevo Evento */
                select: function(start, end) {
                    $('#newEvent #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#newEvent #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#newEvent').modal('show');
                },
                /**Editar Titulo o Eliminar Evento */
                eventRender: function(event, element) {
                    element.bind('dblclick', function() {
                        $('#editDeleteEvent #id').val(event.id);
                        $('#editDeleteEvent #title').val(event.title);
                        $('#editDeleteEvent #color').val(event.color);
                        $('#editDeleteEvent').modal('show');
                    });
                },
                /**Si Cambiamos de lugar el Evento */
                eventDrop: function(event, delta, revertFunc) {
                    /**Llamamos a la Función que se va a Encargar de Editar  */
                    update(event);
                },
                /**Si Cambiamos el Tamaño del Evento */
                eventResize: function(event, dayDelta, minuteDelta, revertFunc) {
                    /**Llamamos a la Función que se va a Encargar de Editar  */
                    update(event);
                },
                /**Mostramos todos los Eventos */
                events: [
                    /**Recorremos todos los resultados */
                    <?php foreach ($events as $event) {
                    ?> {
                            id: '<?php echo $event["id"]; ?>',
                            title: '<?php echo $event["title"]; ?>',
                            start: '<?php echo $event["start"]; ?>',
                            end: '<?php echo $event["end"]; ?>',
                            color: '<?php echo $event["color"]; ?>',
                        },
                    <?php } ?>
                ]
            }); //Fin Full Calendar
            /**Función Encargada de Editar el Evento con los Eventos Anteriores */
            function update(event) {
                /**Capturamos la Fecha y Hora de Incio */
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                /**Comprobamos La Fecha de Fin */
                if (event.end) {
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                } else {
                    end = start;
                }
                /**Capturamos los Datos del Evento */
                id = event.id;
                eventId = id;
                eventStart = start;
                eventEnd = end;
                /**Lo Editamos por Una Petición AJAX */
                $.ajax({
                    url: 'core/editDateEvent.php',
                    type: "POST",
                    data: {
                        eventId: eventId,
                        eventStart: eventStart,
                        eventEnd: eventEnd,
                    },
                    success: function(rep) {
                        if (rep == 'ohSi') {
                            $( "#result" ).html('Event edited correctly.');
                            $('#alert').modal('show');
                        } else {
                            $( "#result" ).html('Can not edit. Try again.');
                            $('#alert').modal('show');
                        }
                    }
                });
            } //Fin Update
        });

        </script>
<!-- ############################################# -->
<!-- ############################################# -->
<!-- ############################################# -->
<!-- ############################################# -->
<!-- Tabla con todos los evnetos -->
<hr style="width:75%; margin-left:auto; margin-right:auto; margin-top:35px" >
<hr style="width:75%; margin-left:auto; margin-right:auto" >

<div class="container" style="padding-top:35px; padding-bottom: 100px">
    <div class="row">
            <div class="col-lg-12 text-center">
                <h1>All events assigned</h1>
            </div>
    </div>

    <div class="row">
    <table class="table table-hover"><tr><th scope='row'>Event</th><th>Start Date</th><th>End Date</th></tr>

<?php
  /**Recorremos todos los resultados */
/**Consulta para Traer Todos los Eventos */
$sqlAllEventsOrdered = "SELECT * FROM eventos ORDER BY start";
/**Preparamos la Consulta */
$resultOrdered = $dbConn->prepare($sqlAllEventsOrdered);
/**Ejecutamos la Consulta */
$resultOrdered->execute();
/**Guardamos Todos los Eventos */
$eventsOrdered = $resultOrdered->fetchAll();
foreach ($eventsOrdered as $event) {
    ?> 
            <?php echo "<tr><th scope='row'>"; echo $event["title"]; echo "</td>";?>
            <?php echo "<td>";echo $event["start"];echo "<td>"; ?>
            <?php echo "<td>";echo $event["end"];echo "</td></tr>"; ?>
        
    <?php }
    echo "</table>";
?>
    </div>
 </div>

</body>


<!--footer -->
<div style="position:relative; bottom:33px; width: 100%; height: 80px;">
<hr >
<footer class="row align-items-center" style="width: 100%; height: 80px;background-color:#6c757d">
<div class="col text-center font-weight-dark">
		&copy Copyright MyLab Team, &#xae All rights reserved.
	</div>
</footer>
<div>
</html>