<?php
  $codigo = $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $raza = $_POST['raza'];
  $fecha = $_POST['fecha'];
  $dueño = $_POST['dueño'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-pencil info" aria-hidden="true"></span>
    Modificación de datos del perro
  </div>
  <div class="panel-body">
    <form action="pagina.php" method="post">
      <input type="hidden" name="trabajo" value="administracion">
      Código *: <input type="text" name="codigo" value="<?=$codigo?>" readonly="readonly"><br>
      Nombre *: <input type="text" name="nombre" value="<?=$nombre?>"><br>
      Raza del perro: <input type="text" name="raza" value="<?=$raza?>"><br>
      Fecha *: <input type="text" name="fecha" value="<?=$fecha?>"><br>
      Nombre del dueño *: <input type="text" name="dueño" value="<?=$dueño?>"><br>
      Teléfono*: <input type="text" name="telefono" value="<?=$telefono?>"><br>
      Correo electrónico: <input type="text" name="correo" value="<?=$correo?>"><br>
  </div>
      <div class="panel-footer">
        <!--<input type="submit" class="btn btn-success" name="accion" value="Modificar">-->
          <button type="submit" class="btn btn-success" name="accion" value="Modificar">
          <span class="glyphicon glyphicon-ok"></span> Modificar
          </button>
        <a class="btn btn-danger" href="pagina.php?trabajo=administracion" role="button">
          <span class="glyphicon glyphicon-remove"></span>Cancelar
        </a>
      </div> 
    </form>
      <p>*Campo obligatorio</p>
</div>
<br><br>