<?= view('header.php') ?>

<script language="JavaScript">
  var data;

  const request = async () => {
    const response = await fetch('csv/RedProbs.csv')
    const text = await response.text()
    data = $.csv.toObjects(text);
    console.log(data)
  }

  request()
</script>

<script>

  function calcularClase(){
    var confiabilidad = 'rel_X' + document.getElementById('confiabilidad').value
    var enlaces = 'links_X' + document.getElementById('enlaces').value
    var capacidad = 'cap_' + document.getElementById('capacidad').value
    var costo = 'cost_' + document.getElementById('costo').value

    var probs = calcProbs(data, [
      confiabilidad, enlaces, capacidad, costo
    ])

    var maxIndx = indexOfMax(probs)

    document.getElementById('clase').value = data[maxIndx]['Class']
  }

</script>

<div class="col-lg-6 col-sm-6 col-md-6">

  <h2>Determinar clase de red</h2>
  <br>

  <div>
    <label>Confiabilidad</label>
    <select id="confiabilidad" class="form-control">
    <?php  for($i = 1; $i <= 5 ; $i++){ ?>

      <option> <?= $i ?> </option>

    <?php } ?>
    </select>
  </div>

  <div>
    <label>Numero de enlaces</label>
    <input type="number" id="enlaces" class="form-control">
  </div>

  <div>
    <label>Capacidad de la red</label>
    <select id="capacidad" class="form-control">
      <option value="Low">Baja</option>
      <option value="Medium">Media</option>
      <option value="High">Alta</option>
    </select>
  </div>

  <div>
    <label>Costo de la red</label>
    <select id="costo" class="form-control">
      <option value="Low">Bajo</option>
      <option value="Medium">Medio</option>
      <option value="High">Alto</option>
    </select>
  </div>

  <br>

  <div>
    <button onclick=calcularClase() class="btn btn-primary">Calcular</button>
  </div>

  <br>

  <div>
    <label>Probablemente, la red es de clase:</label>
    <input type="text" id="clase" class="form-control">
  </div>
</div>

<?= view('footer.php') ?>