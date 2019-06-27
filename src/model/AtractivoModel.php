<?php 

require_once routeDomain . 'Atractivo.php';
require_once routeLibs . 'Connection.php';

class AtractivoModel{
  
  public function __construct(){
    ;
  }

  public function obtenerTodos() : array{
    $db = Connection::singleton();
    $smt = $db->prepare("CALL SP_Obtener_Informacion_Total();");
    
    $smt->execute();

    $smt->bindColumn(1, $id);
    $smt->bindColumn(2, $nombre);
    $smt->bindColumn(3, $latitud);
    $smt->bindColumn(4, $longitud);
    $smt->bindColumn(5, $descripcion);

    $atractivos = array();

    while($smt->fetch(PDO::FETCH_BOUND)){
      $atractivo = new Atractivo($nombre, $descripcion, $latitud, $longitud);
      $atractivo->setID($id);
      array_push($atractivos, $atractivo);
    }

    return $atractivos;
  }

  public function obtenerAtractivo($id_atractivo) : Atractivo{
    $atractivos = $this->obtenerTodos();
    return $atractivos[ $id_atractivo % count($atractivos) ];
  }

  public function obtenerServiciosAtractivo($id_atractivo) : array{
    return array('Ley 7600', 'Rampas', 'Aceras no videntes');
  }

  public function calcularDiferencias($senderos, $vegetariana,  $guia, $souvenirs, $aire_libre, $zona_deportiva, $discapacitado, $zona_fumado, $animales){
    $db = Connection::singleton();
    $smt = $db->prepare("call SP_Obtener_Distancias($senderos, $vegetariana, $guia, $souvenirs, $aire_libre, $zona_deportiva, $discapacitado, $zona_fumado, $animales)");
    
    $smt->execute();

    $resultado = $smt->fetchAll();

    print_r($resultado);
  }

}

?>