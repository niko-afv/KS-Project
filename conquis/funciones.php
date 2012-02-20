<?php
@header('Content-Type: text/html; charset=ISO-8859-1');
include_once 'Db.php';



function conectar(){
    $con = new Db("localhost", "root", "benjamin13");
    $con->connect();
    $con->select_db("conquistadores");
    return $con;
}

function cerrarConexion($con){
    mysql_close($con);
}

function ejecutar($query,$conexion){
    $data = $conexion->select($query, "conquistadores");

    if($conexion->errores)
        return false;
    else
        return $data;
    
}


function generarLista($lista,$tabla){
    $html = '';
    for($i=1;$i<=count($lista);$i++){
        $html = $html . "<option value='" . $lista[$i][$i]['id_' . $tabla] . "'>" . utf8_decode($lista[$i][$i]['nombre']) . "";
    }
    return $html;
}
?>