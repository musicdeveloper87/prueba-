<?php 
    
  
    
    include("template/cabecera.php");
   include('validar.php');
   session_start();
   if(isset($_POST['fullname'])){
       
       $fullname=$_POST['fullname'];
       $password=md5($_POST['password']);

       $query=$conn->query("select * from usuarios where fullname='$fullname' and password='$password'");
       
       if ($query->num_rows>0){
           $row=$query->fetch_array();
           $_SESSION['usuarios']=$row['ID']; 
         header("location:administrador/historialausuario.php") ; 
       }
       else{
           ?>
               <span>Login falló. Usuario no encontrado.</span>
           <?php 
       }
   }




 ?>


<div class="container mlogin">
    
        <div id="login">
    <h1>AUTENTICACION DE USUARIO</h1>
        <form name="loginform" id="loginform" action="" method="POST">
        <p>
        <label for="User_login">NOMBRE DE USUARIO <br>
        <input type= "text" name="fullname" id="fullname" class="input" value="" size="20"/></label>
        </p>
        <p>
        <label for="User_pass">CONTRASEÑA <br>
        <input type= "password" name="password" id="password" class="input" value="" size="20"/></label>

        </p>
        <p class="submit">
            <input  type="submit" name="login" class="button" value="Entrar"/>
        </p>
        <p class="regtext" > no estas registrado? <a href="registrar.php">registrate aqui</a> !</p>
        
        </form>
        </div>
        </div>
        <?php include("template/pie.php");?>
                    

                 
                    
                    


