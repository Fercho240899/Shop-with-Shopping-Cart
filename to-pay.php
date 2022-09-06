<?php
include 'global/config.php';
include 'global/conexion.php';
include 'shopping-car.php';
include 'templates/header.php';
?>

<?php
if($_POST){
    $total=0;
    $SID=session_id();
    foreach($_SESSION["CARRITO"] as $indice=>$producto){

        $total=$total+($producto['PRECIO'] * $producto['CANTIDAD']);
    }
    echo "<h3>".$total."</h3>";

}
?>




<?php
include 'templates/footer.php';
?>
    