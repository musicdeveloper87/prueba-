<?php
include 'config.php';
include 'conexion.php';
include 'carrito.php';
include 'template/cabecera1.php';


echo "<h3>BIENVENIDO </h3>";
?>


 
        
        <div class="alert alert-primary" role="alert">
            <?php echo $mensaje;?>
            <a href="historialDecompras.php" class=" badge badge-succes">ver carrito</a>
            
        </div>
       
        <div class="row">
<?php
      $sentencia=$pdo->prepare("SELECT * FROM tblproductos");
      $sentencia->execute();
      $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      //print_r($listaProductos);
?>
<?php
       foreach ($listaProductos as $producto ) {?>
           <div class="col-3">
                <div class="card">
                    <img 
                    title="<?php echo $producto ['Nombre'];?>"
                    alt="<?php echo $producto ['Nombre'];?>"
                    class="card-img-top" 
                    src="<?php echo $producto['imagen'];?>"

                    data-toggle="popover"
                    data-trigger="hover"
                    data-content="<?php echo $producto['Descripcion'];?>"
                    height="317px"
                    >
            
                    <div class="card-body">
                    <span><?php echo $producto ['Nombre'];?></span>
                        <h5 class="card-title">$<?php echo $producto ['Precio'];?></h5>
                        <p class="card-text">Descripcion</p>
                    <form action=""method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto ['ID'],COD,KEY) ;?>">
                    <input type="hidden" name="Nombre" id="Nombre" value="<?php echo openssl_encrypt($producto ['Nombre'],COD,KEY) ;?>"> 
                    <input type="hidden" name="Precio" id="Precio" value="<?php echo openssl_encrypt($producto ['Precio'],COD,KEY) ;?>">            
                    <input type="hidden" name="Cantidad" id="Cantidad" value="<?php echo openssl_encrypt (1,COD,KEY) ;?>"> 
                
                
                        <button class="btn btn-primary" name="btnaccion" value="Agregar"type="submit">Agregar al carrito</button> 
                            </form>
                        
        </div>
                    
           </div>
                
                 </div>
<?php }?>
        
 </div>
 <script>
   $(function(){
       $('[data-toggle="popover"]').popover()
   });
</script>
  <?php
  include  'template/pie.php';  
?>
 