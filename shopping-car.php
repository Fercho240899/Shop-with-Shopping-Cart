<?php
session_start();
$mensaje="";

if(isset($_POST["btnAccion"])){

    switch($_POST['btnAccion']){

        case'Add':
            
            if(is_numeric(openssl_decrypt( $_POST["id"], COD, KEY))){
                $ID=openssl_decrypt( $_POST["id"], COD, KEY);
                $mensaje.="OK ID Correcto ".$ID."<br/>";

            }else{
                $mensaje.="Upss... ID Incorrecto ".$ID."<br/>";
            }

            if(is_string(openssl_decrypt( $_POST["nombre"], COD, KEY))){ //Validamos un string, desencriptamos el valor name y utilizamos codigo de encriptacion y la llave de encriptacion
                $NOMBRE=openssl_decrypt( $_POST["nombre"], COD, KEY );
                $mensaje.="OK NOMBRE".$NOMBRE."<br/>";
            }else{$mensaje.="Upss.. algo pasa con el nombre"."<br/>"; break;}//Asignamos a una mayuscula $NOMBRE y tambien arrojamos en la variable $mensaje, por si algo no sale bien

            if(is_numeric(openssl_decrypt( $_POST["cantidad"], COD, KEY))){//Validamos un numeric, desencriptamos el valor cantidad y utilizamos codigo de encriptacion y la llave de encriptacion
                $CANTIDAD=openssl_decrypt( $_POST["cantidad"], COD, KEY );
                $mensaje.="OK CANTIDAD".$CANTIDAD."<br/>";
            }else{$mensaje.="Upss.. algo pasa con la cantidad"."<br/>"; break;}//Asignamos a una mayuscula $CANTIDAD y tambien arrojamos en la variable $mensaje, por si algo no sale bien

            if(is_numeric(openssl_decrypt( $_POST["precio"], COD, KEY))){//Validamos un numeric, desencriptamos el valor price y utilizamos codigo de encriptacion y la llave de encriptacion
                $PRECIO=openssl_decrypt( $_POST["precio"], COD, KEY );
                $mensaje.="OK PRECIO".$PRECIO."<br/>";
            }else{$mensaje.="Upss.. algo pasa con el precio"."<br/>"; break;}//Asignamos a una mayuscula $PRECIO y tambien arrojamos en la variable $mensaje, por si algo no sale bien

            if(!isset($_SESSION["CARRITO"])){
                $producto=array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;

            }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'] [$NumeroProductos]=$producto;
            }
            $mensaje=print_r($_SESSION,true);
            
        break;
        case "Delete":
            if(is_numeric(openssl_decrypt( $_POST["id"], COD, KEY))){
                $ID=openssl_decrypt( $_POST["id"], COD, KEY);

                foreach($_SESSION["CARRITO"] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION["CARRITO"][$indice]);
                        echo "<script>alert('Elemento borrado...');</script>";

                    }

                }

            }else{
                $mensaje.="Upss... ID Incorrecto ".$ID."<br/>";
            }

        break;


    }
}

?>