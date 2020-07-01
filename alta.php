
<?php
  // 1) Conexion
  if ($conexion = mysqli_connect("127.0.0.1", "root", "")){
    mysqli_select_db($conexion, "detodounpocosub");

    // 2) Almacenamos los datos del envío POST
    $dni=$_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    if ($q= "SELECT dni FROM sorteosub WHERE dni='$dni'"){
      $reg= mysqli_query ($conexion, $q);
      $nombre_reg=mysqli_fetch_array($reg);
      if ($nombre_reg) {
        header('Location: alta.html');
        echo "<h1>Ya esta en la base de datos.</h1>";
      } else {
        // 3) Preparar la orden SQL
        $consulta = "INSERT INTO sorteosub (id,dni,nombre,apellido,correo) VALUES ('','$dni','$nombre','$apellido','$correo')";
        // 4) Ejecutar la orden y ingresamos datos
        if (mysqli_query($conexion, $consulta) ){
          header('Location: alta.html');
          echo "<h1>Registro agregado.</h1>";
        } else {
          header('Location: error.html');
          echo "<h1>No se agregó...</h1>";
        }
      }
    }
  }else{
    echo "<h2> MySQL no conoce ese usuario y password</h2>";
  }
?>
  <form class="" action="" method="post">
    <p>Deseas Modificar o Borrar tu subcripcion</p>
    <button type="submit" name="button" formaction="modif_buscar.php">modificar</button>
    </br>
    <button type="submit" name="button" formaction="eliminar_dni.html">Borrar</button>
  </form>
