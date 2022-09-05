<?php
include 'global/config.php';
include 'shopping-car.php';
include 'templates/header.php'
?>

<br>
<h3>Lista del carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])) { ?>

<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th witdh="55%">Descripción</th>
            <th witdh="10%" class="text-center">Cantidad</th>
            <th witdh="15%" class="text-center">Precio</th>
            <th witdh="15%" class="text-center">Total</th>
            <th witdh="5%">--</th>
        </tr>
        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td witdh="55%"><?php echo $producto['NOMBRE']?></td>
            <td witdh="10%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td witdh="15%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td witdh="15%" class="text-center"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2); ?></td>
            <td witdh="5%">
            
            <form action="" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo openssl_encrypt($producto ['ID'], COD, KEY);?>">
            <button class="btn btn-danger" type="submit" name="btnAccion" value="Delete">Eliminar</button>
            </form>
        
        
        </td>
        </tr>
        <?php $total=$total+($producto['PRECIO'] * $producto['CANTIDAD']); ?>
        <?php }?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
    </tbody>
</table>

<?php }else{ ?>
    <div class="alert alert-success" role="alert">
        No hay productos al carrito...  
        <a class="nav-link" href="index.php">Home</a>
    </div>

<?php }?>


<?php
    include 'templates/footer.php'
?>
    