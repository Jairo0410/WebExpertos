<?php

require_once routeLibs.'View.php';

class placeController{

  	public function default(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;

			include_once routeModel.'AtractivoModel.php';
			$model = new AtractivoModel();

			$data['atractivo'] = $model->obtenerAtractivo($id);
			$data['servicios'] = $model->obtenerServiciosAtractivo($id);

    	view('place.php', $data);
  	}
}

?>