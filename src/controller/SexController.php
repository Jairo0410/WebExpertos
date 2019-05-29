<?php

require_once routeLibs.'View.php';

class SexController{

  public function guess_sex(){
    require_once routeModel.'SexModel.php';
    $model = new SexModel();

    $data['sexes'] = $model->get_sexes();
    view('sex_form.php', $data);
  }

}

?>