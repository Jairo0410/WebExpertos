<?= view('header.php') ?>

<script language="JavaScript">
  var data;

  const request = async () => {
    const response = await fetch('csv/RecintoProbs.csv')
    const text = await response.text()
    data = $.csv.toObjects(text);
    console.log(data)
  }

  request()
</script>

<script>

  function calcularRecinto(){
    var estilo = document.getElementById('estilo').value
    var sexo = document.getElementById('sexo').value

    // promedios estan guardados con el formato promX_[promedio]
    var promedio = 'prom_X' + document.getElementById('promedio').value

    var probs = calcProbs(data, [estilo, sexo, promedio])

    console.log(probs)

    var maxIndx = indexOfMax(probs)

    document.getElementById('recinto').value = data[maxIndx]['Recinto']
  }

</script>

<div class="col-lg-6 col-sm-6 col-md-6">

  <h2>Determinar recinto</h2>
  <br>

  <div>
    <label>Sexo</label>
    <select id="sexo" class="form-control">
      <option value="N">Prefiero no decirlo</option>
      <option value="M">Hombre</option>
      <option value="F">Mujer</option>
    </select>
  </div>
  <div>
    <label>Promedio</label>
    <select id="promedio" class="form-control">

      <?php  for($i = 20; $i >= 0 ; $i--){ ?>

        <option> <?= $i * 0.5 ?> </option>

      <?php } ?>
    </select>
  </div>
  <div>
    <label>Estilo</label>
    <select id="estilo" class="form-control">
      <option>ASIMILADOR</option>
      <option>DIVERGENTE</option>
      <option>ACOMODADOR</option>
      <option>CONVERGENTE</option>
    </select>
  </div>

  <br>

  <div>
    <button  onclick=calcularRecinto() class="btn btn-primary">Calcular</button>
  </div>

  <br>

  <div>
    <label>Probablemente, su recinto sea:</label>
    <input type="text" id="recinto" class="form-control">
  </div>
</div>

<?= view('footer.php') ?>