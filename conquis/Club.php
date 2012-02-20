<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Club
 *
 * @author nks
 */

require_once 'Miembro.php';

class Club {
    private $nombre;
    private $director;
    private $iglesia;
    
    
    public function __construct() {
        $this->setNombre("");
        
        $xdirector = new Miembro();
        $this->setDirector($xdirector);
                
        $xiglesia = new Iglesia();
        $this->setIglesia($xiglesia);
    }
    
    
    public function setNombre($xnombre){
        $this->nombre = $xnombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setIglesia($xiglesia = object){
        $this->iglesia = $xiglesia;
    }
    
    public function getIglesia(){
        return $this->iglesia;
    }
    
    public function setDirector($xdirector = object){
        $this->director = $xdirector;
    }
    
    public function getDirector(){
        return $this->director;
    }
}
?>
