<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-image: url("huella.jpg");
        }
    </style>    
  </head>
  <body>

    <div class="container">
			<br><br>			
    <div class="panel panel-primary">
    <div class="panel-heading text-center"><h2>Residencia Canina</h2></div>
    <?php
    
      // Conexión a la base de datos
      try {
        $conexion = new PDO("mysql:host=localhost;dbname=residenciacanina;charset=utf8", "root", "root");
      } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
      
      $consulta = $conexion->query("SELECT codigo, nombre, raza, fecha, dueño FROM perros");
         
      ?>
      <table  class="table table-striped">
      <tr>

        <td><b>Código</b></td>
        <td><b>Nombre del perro</b></td>
        <td><b>Raza del perro</b></td>
        <td><b>Fecha de ingreso</b></td>
        <td><b>Nombre del dueño</b></td>
      </tr>

      <?php
      while ($perros = $consulta->fetchObject()) {
        ?>
        <tr>
          
          <td><?= $perros->codigo ?></td>
          <td><?= $perros->nombre ?></td>
          <td><?= $perros->raza ?></td>
          <td><?= $perros->fecha ?></td>
          <td><?= $perros->dueño ?></td>
        </tr>
        <?php              
      }
      ?>
      </table>
      <br>
      Número de perros: <?= $consulta->rowCount() ?>
      
     
    </div>
     <a class="btn btn-default" href="pagina.php?trabajo=administracion" role="button">   
     <span class="glyphicon glyphicon-pencil text-center"></span> Administración
     </a>
  </body>
</html>
