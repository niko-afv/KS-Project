<?php

$func = $_POST['func'];
$params = $_POST['params'];
$func($params);



function formUnete($parametros){
    include_once 'Miembro.php';
    include_once 'Club.php';
    
    $var = validarDatos($parametros);
    $club = $parametros['club'];
    $nombre = $parametros['nombre'];
    $mail = $parametros['mail'];
    $pass = $parametros['pass'];
    $pass2 = $parametros['pass2'];
    
    $xmiembro = new Miembro();
    
    $xmiembro->setNombre($nombre);
    $xmiembro->setEmail($mail);
    $xmiembro->setPass($pass);
    
    
    echo json_encode($var);
}


function validarDatos($parmestros){
    if($parmestros['club']==''):return false;endif;
    if($parmestros['nombre']==''):return false;endif;
    if($parmestros['mail']==''):return false;endif;
    if($parmestros['pass']==''):return false;endif;
    if($parmestros['pass2']==''):return false;endif;
    if($parmestros['pass']!=  $parmestros['pass2']):return false;endif;
    
    
    return true;
}


function redireccionar(){
    header("Location : http://localhost/conquis/#error ");
}
?>