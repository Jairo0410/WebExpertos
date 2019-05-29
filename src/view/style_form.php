<?= view('header.php') ?>

<script language="JavaScript">
  var data;

  const request = async () => {
    const response = await fetch('csv/EstiloProbs.csv')
    const text = await response.text()
    data = $.csv.toObjects(text);
    console.log(data)
  }

  request()
</script>

<script language="JavaScript">

  function calcular(){

    var ec = parseInt(document.estilo.c5.value)+parseInt(document.estilo.c9.value)+parseInt(document.estilo.c13.value)+parseInt(document.estilo.c17.value)+parseInt(document.estilo.c25.value)+parseInt(document.estilo.c29.value);
    var or = parseInt(document.estilo.c2.value)+parseInt(document.estilo.c10.value)+parseInt(document.estilo.c22.value)+parseInt(document.estilo.c26.value)+parseInt(document.estilo.c30.value)+parseInt(document.estilo.c34.value);
    var ca = parseInt(document.estilo.c7.value)+parseInt(document.estilo.c11.value)+parseInt(document.estilo.c15.value)+parseInt(document.estilo.c19.value)+parseInt(document.estilo.c31.value)+parseInt(document.estilo.c35.value);
    var ea = parseInt(document.estilo.c4.value)+parseInt(document.estilo.c12.value)+parseInt(document.estilo.c24.value)+parseInt(document.estilo.c28.value)+parseInt(document.estilo.c32.value)+parseInt(document.estilo.c36.value);

    caec = ca-ec;
    eaor = ea-or;


    // valores ec estan guardados con el formato ecX_[ec]
    ec = 'ec_X' + ec
    // valores or estan guardados con el formato orX_[or]
    or = 'or_X' + or
    // valores ca estan guardados con el formato caX_[ca]
    ca = 'ca_X' + ca
    // valores ea estan guardados con el formato eaX_[ea]
    ea = 'ea_X' + ea

    var probs = calcProbs(data, [ec, or, ca, ea])

    console.log(probs)

    var maxIndx = indexOfMax(probs)

    document.final.EC.value = ec;
    document.final.RO.value = or;
    document.final.CA.value = ca;
    document.final.EA.value = ea;
    document.final.CAEC.value = caec;
    document.final.EAOR.value = eaor;
    document.final.ESTILOFINAL.value = data[maxIndx]['Estilo'];
  }

</script>
<h3>
  ¿Cuál es su estilo de aprendizaje?
</h3>

<div class="jumbotron">
  <h4> Instrucciones: </h4>

  <p> 
  Para utilizar el instrumento usted debe conceder una calificación alta a aquellas palabras que mejor caracterizan la forma 
  en que usted aprende, y una calificación baja a las palabras que menos caracterizan su estilo de aprendizaje.
  </p>

  <p> Le puede ser difícil seleccionar
  las palabras que mejor describen su estilo de aprendizaje, ya que no
  hay respuestas correctas o incorrectas.
  </p>

  <p> Todas las respuestas son buenas, ya que el fin del instrumento es describir
  cómo y no juzgar su habilidad para aprender.
  </p>

  <p> De inmediato encontrará nueve series o líneas de cuatro palabras cada una.
  Ordene de mayor a menor cada serie o juego de cuatro palabras que hay en cada línea,
  ubicando 4 en la palabra que mejor caracteriza su estilo de
  aprendizaje, un 3 en la palabra siguiente en cuanto a la
  correspondencia con su estilo; a la siguiente un 2, y un 1 a la
  palabra que menos caracteriza su estilo. Tenga cuidado de ubicar un
  número distinto al lado de cada palabra en la misma línea.
  </p>
</div>

<?php function displayOptions($name, $description){ ?>
  <?= $description ?>
  <select name="<?= $name ?>" class="form-control">
<?php for($i = 1; $i <= 4; $i++){ ?>
    <option value="<?= $i ?>"> <?= $i ?></option>
<?php } ?>
  </select>
<?php }?>

<?php 
$labels = [
  "discerniendo", "ensayando", "involucrandome", "practicando",
  "receptivamente", "relacionando", "analiticamente", "imparcialmente",
  "sintiendo", "observando", "pensando", "haciendo",
  "aceptando", "arriesgando", "evaluando", "con cautela",
  "intuitivamente", "productivamente", "lógicamente", "cuestionando",
  "abstracto", "observando", "concreto", "activo",
  "orientaddo al presente", "reflexivamente", "orientado hacia el futuro", "prágmatico",
  "aprendo más de la experiencia", "aprendo más de la observación", "aprendo más de la conceptualización", "aprendo más de la experimentación",
  "emotivo", "reservado", "racional", "abierto"
]
?>

<br>
<h4> Yo aprendo... </h4>
<form name="estilo">
  <div class="col-lg-12">
    <table style="table">
      <tbody>
        <tr>
        <?php for($i=1; $i <= count($labels); $i++) { ?>
          <td>
          <?php displayOptions("c$i", $labels[$i - 1]); ?>
          </td>
          <?php if(($i % 4) == 0) { ?>
          </tr>
          <?php }?>
        <?php } ?>
      </tbody>
    </table>
  </div>
</form>

<button  class="btn btn-primary" onclick="calcular()">CALCULAR</button>

<form name="final" action="estilo.php" method="post">
  <input name="EC" maxlength="12" size="12" type="hidden" >
  <input name="RO" maxlength="12" size="12" type="hidden" >
  <input name="CA" maxlength="12" size="12" type="hidden" >
  <input name="EA" maxlength="12" size="12" type="hidden" >

  <input type="hidden" maxlength="3" size="3" name="CAEC">
  <input type="hidden" maxlength="3" size="3" name="EAOR">

  <br>

  <div class="col-lg-3 col-sm-3 col-md-3">
    <label for="ESTILOFINAL"> Probablemente, su estilo de aprendizaje sea: </label>
    <input class="form-control" name="ESTILOFINAL">
  </div>
</form>

<?= view('footer.php') ?>