<?php

require_once routeLibs.'View.php';

class RecommendationController{

  public function default(){
    require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

    $data['servicios'] = $model->getServicios();
    $data['estereotipos'] = $model->getEstereotipos();

    view('seleccionarServicios.php', $data);
  }

  public function buscarRecomendaciones(){

  	/*
  	Obtener datos del form
	Aplicar distancia euclideana o bayes
  	*/
	require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

    $data['atractivos'] = $model->getAtractivos();
  	view('buscarRecomendaciones.php', $data);
  }

  public function verDetalleAtractivo(){
  	$id = isset($_GET['id']) ? $_GET['id'] : 0;

  	require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

  	$data['atractivo'] = $model-> getAtractivoPorId($id);

  	view('verDetalleAtractivo.php', $data);
  }

  public function agregarAtractivo(){
    require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

    $data['servicios'] = $model->getServicios();
  
    if(isset($_POST['agregar'])){
      $data['mensaje'] = $model->agregarAtractivo();
    }

    view('agregarAtractivo.php', $data);
  }

}

?>