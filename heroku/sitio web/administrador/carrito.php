
<?php

    session_start();
    $mensaje="";
    if(isset($_POST['btnaccion'])){
        switch ($_POST['btnaccion']){
        
       
            case 'Agregar':
                if (is_numeric (openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje.="OK ID CORRECTO".$ID;


                }else{

                    $mensaje.="UpSSS.... ID INCORRECTO".$ID;

                }
                if(is_string(openssl_decrypt($_POST['Nombre'],COD,KEY))){
                    $NOMBRE=openssl_decrypt($_POST['Nombre'],COD,KEY);
                    $mensaje.="OK Nombre CORRECTO".$NOMBRE;
                }else{  $mensaje.="Upsss. algo pasa con el nombre"; break;}
                 
                if(is_numeric(openssl_decrypt($_POST['Cantidad'],COD,KEY))){
                    $CANTIDAD=openssl_decrypt($_POST['Cantidad'],COD,KEY);
                    $mensaje.="OK Cantidad CORRECTA".$CANTIDAD;
                }else{  $mensaje .="Upsss. algo pasa con la Cantidad"; break;}

                if(is_numeric(openssl_decrypt($_POST['Precio'],COD,KEY))){
                    $PRECIO=openssl_decrypt($_POST['Precio'],COD,KEY);
                    $mensaje.="OK  Precio CORRECTO".$PRECIO;

              
              }else{  $mensaje.="Upsss. algo pasa con el Precio"; break;}

                if(!isset($_SESSION['CARRITO'])){
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO,

                    );
                    $_SESSION['CARRITO'] [0]=$producto;
                }else{
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO,

                    );
                    $SESSION['CARRITO'] [$NumeroProductos]=$producto;
                }
                $mensaje=print_r($_SESSION,true);
            break;
            case "Eliminar":
                if (is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if ($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('Elemento borrado....');</script>";

                        }

                    }

                
            }else{

                $mensaje.="UpSSS.... ID INCORRECTO".$ID;
            }
            break;
            }
            
            
       
}



?>
<?php 


?>