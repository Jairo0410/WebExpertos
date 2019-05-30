<?php 

require_once routeDomain . 'Atractivo.php';

class AtractivoModel{

  
  private $atractivos;
  
  public function __construct(){
    $this->atractivos  =  [
      new Atractivo('Casa Turire', 'Hotel Familiar en medio de la montaña', 31, 22),
      new Atractivo('Parque de Diversiones', 'Lugar de diversion familiar y para todas las edades', 31, 22),
      new Atractivo('Museo de los niños', 'Donde se aprende jugando', 31, 22),
      new Atractivo('Costa Rica Country Club', 'Un Club dinámico, socialmente responsable, y con las mejores instalaciones deportivas y sociales de la región', 31, 22),
      new Atractivo('Refugio de Vida Silvestre Monteverde', 'Avistamiento de animales y aves silvestres, caminatas familiares guiadas', 31, 22),
      //new Atractivo('Casa Turire', 'Hotel Familiar en medio de la montaña', 31, 22),
      //new Atractivo('Casa Turire', 'Hotel Familiar en medio de la montaña', 31, 22),
      //new Atractivo('Casa Turire', 'Hotel Familiar en medio de la montaña', 31, 22),
      //new Atractivo('Casa Turire', 'Hotel Familiar en medio de la montaña', 31, 22),
    ];
  }

}

?>