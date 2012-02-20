<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Miembro
 *
 * @author nks
 */
require_once 'Club.php';
require_once 'Db.php';

class Miembro {
    
    private $nombre;
    private $email;
    private $pass;
    private $club;
    
    
    public function __construct() {
        $this->setNombre("");
        $this->setEmail("");
        $this->setPass("");
        
        $xclub = new Club();
        $this->setClub($xclub);
    }
    
    
    public function setNombre($xnombre){
        $this->nombre = $xnombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setEmail($xemail){
        $this->email = $xemail;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setPass($xpass){
        $this->pass = $xpass;
    }
    
    public function getPass(){
        return $this->pass;
    }
    
    public function setClub($xclub = object){
        $this->club = $xclub;
    }
    
    public function getClub(){
        return $this->club;
    }
    
    public function save(){
        
        
        $query = "INSERT INTO miembros values (null,'" . $this->getNombre() . "',null,'" . $this->getEmail() . "')";
        
        $conn = new Db("localhost", "root", "benjamin13");
        $conn->connect();
        $conn->insert($query, "conquistadores");
    }
}
//put your code here 
?>
