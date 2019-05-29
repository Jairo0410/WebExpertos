<?= view('header.php') ?>

<script language="JavaScript">
  var data;

  const request = async () => {
    const response = await fetch('csv/SexoProbs.csv')
    const text = await response.text()
    data = $.csv.toObjects(text);
    console.log(data)
  }

  request()
</script>

<script>

  function calcularSexo(){
    var estilo = document.getElementById('estilo').value
    var recinto = document.getElementById('recinto').value

    // promedios estan guardados con el formato promX_[promedio]
    var promedio = 'prom_X' + document.getElementById('promedio').value

    var probs = calcProbs(data, [estilo, recinto, promedio])

    var maxIndx = indexOfMax(probs)

    document.getElementById('sexo').value = data[maxIndx]['Sexo']
  }

</script>

<div class="col-lg-6 col-sm-6 col-md-6">

  <h2>Determinar sexo del estudiante</h2>
  <br>

  <div>
    <label>Estilo</label>
    <select id="estilo" class="form-control">
      <option>ASIMILADOR</option>
      <option>DIVERGENTE</option>
      <option>ACOMODADOR</option>
      <option>CONVERGENTE</option>
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
    <label>Recinto</label>
    <select id="recinto" class="form-control">
      <option>Turrialba</option>
      <option>Paraiso</option>
    </select>
  </div>

  <br>

  <div>
    <button onclick=calcularSexo() class="btn btn-primary">Calcular</button>
  </div>

  <br>

  <div>
    <label>Probablemente, su sexo es:</label>
    <input type="text" id="sexo" class="form-control">
  </div>
</div>

<?= view('footer.php') ?>