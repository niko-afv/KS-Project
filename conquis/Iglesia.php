<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Igleisa
 *
 * @author nks
 */
class Igleisa {
    
    private $nombre;
    private $direccion;
    
    public function __contruct__(){
        
    }
    
    
    public function setNombre($xnombre){
        $this->nombre = $xnombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setDireccion($xdireccion){
        $this->direccion = $xdireccion;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }
}

?>
