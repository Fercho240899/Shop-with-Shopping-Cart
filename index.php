<?php
include 'global/config.php';
include 'global/conexion.php';
include 'shopping-car.php';
include 'templates/header.php'
?>


        <br>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="#" class="badge badge-success">Ver Carrito</a>
        </div>

        <div class="row" >

        <?php
        $sentencia=$pdo->prepare("SELECT * FROM `productos`");
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        /*print_r($listaProductos);*/
        ?>

        <?php foreach($listaProductos as $producto){ ?>
            <div class="col-3">
                <div class="card">
                    <img 
                    title="<?php echo $producto ['name'];?>"
                    alt="<?php echo $producto ['name'];?>"
                    class="card-img-top" 
                    src="<?php echo $producto ['image'];?>"
                    height="317px"
                    
                    data-toggle="popover"
                    data-trigger="hover"
                    data-content="<?php echo $producto ['description'];?>"
                    >
                    <div class="card-body">

                    <span><?php echo $producto ['name'];?></span>
                        <h5 class="card-title"><?php echo $producto ['price'];?></h5>

                        <form action="" method="post">
                            <input type="hidden" id="id" name="id" value="<?php echo openssl_encrypt($producto ['id'], COD, KEY);?>">
                            <input type="hidden" id="nombre" name="nombre" value="<?php echo openssl_encrypt($producto ['name'], COD, KEY);?>">
                            <input type="hidden" id="precio" name="precio" value="<?php echo openssl_encrypt($producto ['price'], COD, KEY);?>">
                            <input type="hidden" id="cantidad" name="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);;?>">
                        <button class="btn btn-primary" name="btnAccion" value="Add" type="submit">Agregar al carrito</button>
                        </form>


                    </div>
                </div>
            </div>

        <?php } ?>

    <script>
        $(function(){
            $('[data-toggle="popover"]').popover()
        });
    </script>

    <?php
    include 'templates/footer.php'
    ?>
    
