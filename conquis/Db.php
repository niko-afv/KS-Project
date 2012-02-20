<?php @header('Content-Type: text/html; charset=ISO-8859-1');
/*  Fecha       :   Miercoles 29-06-2011 - 03:20 a.m
*  Autor        :   Nicolás Fredes Véliz
*  Nombre Clase :   Db.php
*  Nota         :   Clase que permite conectarse a una base de datos y hacer consultas. 
*                   Manejo de Errores:
*                   Los Errores producidos en alguna parte de la clase se almacenan en el el atributo $errores,
*                   el cual es un array, para mostrarlos se debe recorrer el array y mostrar cada elemento del mismo.
*/

class Db{
  var $server;            //Atributo que recibirá el nombre sel servidor.
  var $user;              //Atributo que recibirá el nombre de usuario.
  var $pass;              //Atributo que recibirá la contraseña del usuario
  var $errores=array();   //Atributo de tipo ARRAY que recibirá todos los errores que sucedan durante la conexion y las consultas

  public function __construct($xserver,$xuser,$xpass){
    ////Contructor de la clase que recibe nombre de: servidor, usuario y la clave del usuario
    $this->setServer($xserver); //Inicializamos el atributo server.
    $this->setUser($xuser);     //Inicializamos el atributo user.
    $this->setPAss($xpass);     //Inicializamos el atributo pass.
  }
  /*
   * Metodos que Establacen los atributos de la clase
   */
  private function setServer($xserver="localhost"){
    ////Metodo que Inicializa o establece el nombre del servidor.
    $this->server=$xserver;
  }
  private function setUser($xuser){
    //Metodo que inicializa o establece el nombre de usuario.
    $this->user=$xuser;
  }
  private function setPAss($xpass){
    //Metodo que inicializa o establece la password del usuario
  $this->pass=$xpass;
  }
  private function setError($xerror){
    ////Metodo que inicializa o establece el atributo de errores.
    $this->errores[]= $xerror;
  }
  /*
   * Metodos que Obtienen el valor de los atributos de la clase
   */
  public function getServer(){
    //Metodo que permite obtener el valor del atributo server.
    return $this->server;
  }
  public function getUser(){
    //Metodo que permite obtener el valor del atributo user.
    return $this->user;
  }
  public function getPass(){
    ////Metodo que permite obtener el valor del atributo pass.
    return $this->pass;
  }

  //Metodos de conexion con el servidor y consultas a la DB
  public function connect(){
    ////Nos conectamos con el servidor, en caso de error llenamos el atributo de errores y nos salimos retornando un FALSE
    if(@!$conn=mysql_connect($this->getServer(),  $this->getUser(),  $this->getPass())){
      $this->setError("El servidor no esta disponible");
      return false;            
    }//Si todo sale bien retornamos un TRUE, para decir que todo esta OK!
    return $conn;
  }

  public function select_db($db){
    if(@!mysql_select_db($db)){//Seleccionamos la base de datos en casso de error llenamos el atributo de errores y retornamos una FALSE
      $this->setError("Base de datos no encontrada");
      return false;            
    }//Si todo sale bien retornamos un TRUE, para indicar que todo esta OK!
    return true;
  }

  public function insert($query,$db){
      mysql_query($query);//Ejecutamos la consulta
      $num =  mysql_affected_rows();
      
      if($num!=0)
          return true;
      return false;
  }

  public function select($query,$db){
    $result = mysql_query($query);//Ejecutamos la consulta

    /***Si la consulta no devuelve datos establecemos un error y salimos de la funcion retornando un FALSE***/
    if(@mysql_num_rows($result) == 0):$this->setError("No se encontraron coincidencias");return;endif;

    $i=0;

    while($array = mysql_fetch_array($result)){
      ////Mientras podamos obtener datos de la consulta ....
      $i++;
      if($array[0]!=""):$matriz[$i] = array($i=>$array);endif;//... Comprobamos que el resultado no venga vacio y llenamos una matriz con cada array
    }
    return $matriz;
  }

  public function delete($query,$db){
    $result=mysql_query($query);
    if(mysql_affected_rows()==0){
      $this->setError("No Se Ha Podido Concretar la Eliminacion");
      return FALSE;
    }
    return TRUE;
 }

  public function update($query,$db){

  }
}
?>