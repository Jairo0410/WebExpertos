<?php 
  include_once 'header.php';
?>

<div class="row">
  <?php 
    include_once 'map.php';
  ?>

  <div class="col-lg-4" style="margin: 25px; border-style: dashed; display: flow-root;">
    <label style="margin-top: 10px;">Preferencia</label>
    <select class="form-control">
      <option>Sin especificar</option>
      <option>Aventurero</option>
      <option>Gastronomico</option>
      <option>Historico</option>
    </select>
    <label style="margin-top: 10px;">Desea espacio de fumado?</label>
    <form action="">
      <input type="radio" name="A" value="1" checked> Si<br>
      <input type="radio" name="B" value="0"> No<br>
    </form>
    <label style="margin-top: 10px;">Requiere accesso para discapacitados?</label>
    <form action="">
      <input type="radio" name="C" value="1" checked> Si<br>
      <input type="radio" name="D" value="0"> No<br>
    </form>
    <label style="margin-top: 10px;">Lleva consigo una mascota?</label>
    <form action="">
      <input type="radio" name="E" value="1" checked> Si<br>
      <input type="radio" name="F" value="0"> No<br>
    </form>
  <div>
</div>

<?php 
  include_once 'footer.php';
?>