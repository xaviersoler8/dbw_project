<?php
require_once('connection.php');
/**Comprobamos que todos los Campos vengan Completos */
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
    
    /**Recibimos los Datos */
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sqlAddEvent = "INSERT INTO eventos(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	/**Preparamos la Query y lo Guardamos para Comprobar los Errores */
	$queryPrepare = $dbConn->prepare( $sqlAddEvent );
	if ($queryPrepare == false) {
    /**Mostramos el Error */
	 print_r($dbConn->errorInfo());
	 die ('Ups! Something went wrong.');
    }
    /**Si todo esta bien Ejecutamos la Query Preparada */
	$queryExecute = $queryPrepare->execute();
	if ($queryExecute == false) {
    /**Mostramos el Error */
	 print_r($queryPrepare->errorInfo());
	 die ('Ups! Something went wrong.');
	}

}
/**Volvemos a la Pagina que Genero la Petición */
header('Location: '.$_SERVER['HTTP_REFERER']);
