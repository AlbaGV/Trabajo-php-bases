
<div class="container">
			<br><br>			
    <div class="panel panel-primary">
    <div class="panel-heading text-center"><h2>Residencia Canina - Administracion</h2></div>
<?php
         
  $conexion = new PDO("mysql:host=localhost;dbname=residenciacanina;charset=utf8", "root", "root");
 

  if($_POST['accion'] == "Nuevoperro") {
    $inserta = "INSERT INTO perros (codigo, nombre, raza, dueño, telefono, correo) VALUES (\"$_POST[codigo]\",\"$_POST[nombre]\", \"$_POST[raza]\", \"$_POST[dueño]\", \"$_POST[telefono]\", \"$_POST[correo]\")";
    $conexion->exec($inserta);
  }

  if($_POST['accion'] == "Modificar") {
    $modifica = "UPDATE perros SET  nombre=\"$_POST[nombre]\", raza=\"$_POST[raza]\", fecha=\"$_POST[fecha]\", dueño=\"$_POST[dueño]\", telefono=\"$_POST[telefono]\", correo=\"$_POST[correo]\" WHERE codigo=\"$_POST[codigo]\"";
    $conexion->exec($modifica);
  }

  if($_POST['accion'] == "Eliminar") {
    $borra = "DELETE FROM perros WHERE codigo=\"$_POST[codigo]\"";
    $conexion->exec($borra);
  }
          
  
  $consulta = $conexion->query("SELECT codigo, nombre, raza, fecha, dueño, telefono, correo FROM perros");
  $consulta2 = $conexion->query("SELECT usuario, password FROM pass");
  
  // Empieza el login
  if (!isset($_SESSION['logueado'])) {
    $_SESSION['logueado'] = false;
  } 
  
  // Formulario de login
  if (!$_SESSION['logueado']) {
  ?>
    <p><strong>Debe iniciar sesión para acceder a la parte de administración.</strong></p>
    <form action="pagina.php" method="post">
      <input type="hidden" name="trabajo" value="administracion">
      Usuario: <input type="text" name="usuario" autofocus><br>
      Contraseña: <input type="password" name="contrasena"><br><br>
      <input type="submit" value="Iniciar sesión">
    </form>
    <br>
<?php
  }

  // Comprueba nombre de usuario y contraseña
  
    $count = 0;

        while ($pass = $consulta2->fetchObject())
        {
            if($pass->usuario==$_POST['usuario'] && $pass->password==$_POST['contrasena']){
                $count++;
            }
            

        }

       
  if (isset($_POST['usuario'])) {
    if ($count == 1) {
      $_SESSION['logueado'] = true;
      header("Refresh: 0; url=pagina.php?trabajo=administracion", true, 303); // recarga la página
    } else {
      echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
      header("Refresh: 2; url=pagina.php?trabajo=administracion", true, 303); // recarga la página
    }
  }
  
  if ($_SESSION['logueado']) {
   ?>
  
  <table  class="table table-striped">
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Raza del perro</th>
      <th>Fecha de ingreso</th>
      <th>Nombre del dueño</th>
      <th>Teléfono</th>
      <th>Correo electrónico</th>
      <th></th>
      <th></th>
    </tr>
    
  <?php

    while ($perros = $consulta->fetchObject()) {
      ?>
      <tr>
      <td><?=$perros->codigo?></td>
      <td><?=$perros->nombre?></td>
      <td><?=$perros->raza?></td>
      <td><?=$perros->fecha?></td>
      <td><?=$perros->dueño?></td>
      <td><?=$perros->telefono?></td>
      <td><?=$perros->correo?></td>
      <td>
        <form action="pagina.php" method="post">
          <input type="hidden" name="trabajo" value="administracion">
          <input type="hidden" name="codigo" value="<?=$perros->codigo?>">
          <input type="hidden" name="accion" value="Eliminar">
          <button type="submit" class="btn btn-danger">
          <span class="glyphicon glyphicon-trash"></span> Eliminar
          </button>
        </form>
      </td>
      <td>
        <form action="pagina.php" method="post">
          <input type="hidden" name="trabajo" value="modificar">
          <input type="hidden" name="codigo" value="<?=$perros->codigo?>">  
          <input type="hidden" name="nombre" value="<?=$perros->nombre?>">
          <input type="hidden" name="raza" value="<?=$perros->raza?>">
          <input type="hidden" name="fecha" value="<?=$perros->fecha?>">
          <input type="hidden" name="dueño" value="<?=$perros->dueño?>">
          <input type="hidden" name="telefono" value="<?=$perros->telefono?>">
          <input type="hidden" name="correo" value="<?=$perros->correo?>">
          <button type="submit" class="btn btn-warning">
          <span class="glyphicon glyphicon-pencil"></span> Modificar
          </button>
        </form>
      </td>            
      </tr>
      <?php
    }
    ?>
    			
                     
    <!-- Añadir un nuevo perro /////////////////////////////////-->
    <form action="pagina.php" method="post">
      <input type="hidden" name="trabajo" value="administracion">
      <input type="hidden" name="accion" value="Nuevoperro">
      <tr>
          <td><strong>Código *</strong></td>
          <td><strong>Nombre *</strong></td>
          <td><strong>Raza del perro</strong></td>
          <td><strong>Dueño *</strong></td>
          <td><strong>Teléfono *</strong></td>
          <td><strong>Correo electrónico</strong></td>
          <td></td>
      </tr>
      <tr>
      <td><input type="text" name="codigo" size="5"></td>
      <td><input type="text" name="nombre"size="5"></td>
      <td><input type="text" name="raza"size="5"></td>
      <td><input type="text" name="dueño" size="5"></td>
      <td><input type="text" name="telefono"  size="5"></td>
      <td><input type="text" name="correo"  size="5"></td>
      <td colspan="2">
        <button type="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-ok"></span> Nuevo perro
        </button>
      </td>

    </tr>
    </form>
  </table>
    <p>* Campo obligatorio</p>
 </div>
 
<?php
  }
  ?>
<a class="btn btn-info" href="pagina.php?trabajo=index" role="button">
     <span class="glyphicon glyphicon-remove"></span>Volver
 </a>