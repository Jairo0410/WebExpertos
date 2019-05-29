<?= view('header.php') ?>

<script language="JavaScript">
  var data;

  const request = async () => {
    const response = await fetch('csv/ProfesorProbs.csv')
    const text = await response.text()
    data = $.csv.toObjects(text);
    console.log(data)
  }

  request()
</script>

<script>

  function calcularClase(){
    var genero = document.getElementById('genero').value
    var edad = document.getElementById('edad').value
    var autoeval = document.getElementById('autoeval').value
    var cursos_similares = document.getElementById('cursos_similares').value
    var experticia = document.getElementById('experticia').value
    var hab_computador = document.getElementById('hab_computador').value
    var cursos_web = document.getElementById('cursos_web').value
    var sitios_web = document.getElementById('sitios_web').value

    var probs = calcProbs(data, [
      edad, genero, autoeval, cursos_similares, experticia, hab_computador, cursos_web, sitios_web
    ])

    var maxIndx = indexOfMax(probs)

    document.getElementById('clase').value = data[maxIndx]['Class']
  }

</script>

<div class="col-lg-6 col-sm-6 col-md-6">

  <h2>Datos personales</h2>

  <div>
    <label>Edad</label>
    <select id="edad" class="form-control">
      <option value="men_30">Menor a 30</option>
      <option value="30_50">Entre 30 y 55</option>
      <option value="may_55">Mayor a 55</option>
    </select>
  </div>

  <div>
    <label>Genero</label>
    <select id="genero" class="form-control">
      <option value="not_available">Prefiero no decirlo</option>
      <option value="female">Mujer</option>
      <option value="male">Hombre</option>
    </select>
  </div>

  <br>

  <h2>Datos técnicos</h2>

  <div>
    <label>Auto-evaluación</label>
    <select id="autoeval" class="form-control">
      <option value="beginner">Principiante</option>
      <option value="intermediate">Intermedio</option>
      <option value="advanced">Avanzado</option>
    </select>
  </div>

  <div>
    <label>Veces que ha enseñado cursos similares</label>
    <select id="cursos_similares" class="form-control">
      <option value="exp_never">Nunca</option>
      <option value="exp_1_to_5">1 a 5</option>
      <option value="exp_more_5">mas de 5</option>
    </select>
  </div>

  <div>
    <label>Area de experticia</label>
    <select id="experticia" class="form-control">
      <option value="back_dm">Toma de decisiones</option>
      <option value="back_nd">Diseño de redes</option>
      <option value="back_other">Otro</option>
    </select>
  </div>

  <div>
    <label>Habilidad con computadores</label>
    <select id="hab_computador" class="form-control">
      <option value="skl_low">Baja</option>
      <option value="skl_avg">Promedio</option>
      <option value="skl_high">Alta</option>
    </select>
  </div>

  <div>
    <label>Experiencia con recursos de enseñanza en la web</label>
    <select id="cursos_web" class="form-control">
      <option value="wt_nver">Nunca</option>
      <option value="wt_sometimes">A veces</option>
      <option value="wt_often">Comúnmente</option>
    </select>
  </div>

  <div>
    <label>Experiencia en uso de sitios web</label>
    <select id="sitios_web" class="form-control">
      <option value="we_never">Nunca</option>
      <option value="we_sometimes">A veces</option>
      <option value="we_often">Comúnmente</option>
    </select>
  </div>

  <br>

  <div>
    <button onclick=calcularClase() class="btn btn-primary">Calcular</button>
  </div>

  <br>

  <div>
    <label>Probablemente, usted es un profesor:</label>
    <input type="text" id="clase" class="form-control">
  </div>
</div>

<?= view('footer.php') ?>