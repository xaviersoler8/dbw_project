<?php
try
{
    $host = "localhost";//Servidor
    $db ="mylab";//Nombre de la Base de Datos
    $userDb = "mylab"; //Usuario de la Base de Datos en este caso es root para localhost por defecto
    $password = "dbmylab"; //Por defecto esta en blanco para localhost
	$dbConn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $userDb, $password);
}
catch(Exception $e)
{
        die("Ups! The connection brokes: ".$e->getMessage());
}
