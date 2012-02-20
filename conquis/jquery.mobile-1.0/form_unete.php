<?php
include_once 'Integrante.php';


$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$club = $_POST['club'];


$integrante = new Integrante();


$integrante->username = $username;
$integrante->password = $password;
if($integrante->save() !=1){
    header("location : http://localhost/JQueryMobile/index.php");
}else{
    header("location : http://localhost/JQueryMobile/success.php");
}
?>
