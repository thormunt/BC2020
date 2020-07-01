
<?php
 $dni=$_POST['dni'];
 if ($conexion = mysqli_connect("127.0.0.1", "root", "")){
  mysqli_select_db($conexion, "detodounpocosub");
  if ($consulta="SELECT*FROM sorteosub WHERE dni=$dni") {
    $datos= mysqli_query($conexion, $consulta);
    $fila2=mysqli_fetch_array($datos);
    if ($fila2['dni']==$dni) {

      $eliminar= "DELETE FROM sorteosub WHERE dni=$dni";
      if (mysqli_query($conexion, $eliminar)){

        echo "<p>Registro eliminado.</p>";
        }else {
        echo "<p> MySQL no conoce ese usuario y password</p>";
      }
    } else {
        echo "El dni no se encuentra en la base de datos";
    }
  }
 };
?>
