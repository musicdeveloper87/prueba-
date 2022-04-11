<?php 

include("validar.php");
include("template/cabecera.php");

session_start();

if(isset($_POST['register'])){
    $fullname=$_POST['fullname'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $query=$conn->query("SELECT * from usuarios where fullname='$fullname'");

    if ($query->num_rows>0){
        ?>
              <span>ese nombre ya existe.</span>
          <?php 
    }

    elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$fullname)){
        ?>
              <span style="font-size:11px;">nombre invalido, no usar caractaeres especiales ni espacio.</span>
          <?php 
    }
    elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$password)){
        ?>
              <span style="font-size:11px;">nombre invalido, no usar caractaeres especiales ni espacio.</span>
          <?php 
    }
    else{
        $mpassword=md5($password);
        $conn->query("insert into usuarios (fullname, password,email) values ('$fullname', '$mpassword','$email')");
        ?>
              <span>Sign up Successful.</span>
          <?php 
    }
}
?>




<?php if (!empty ($message)){echo "<p class=\"error\">"."mensaje:".$message."</p>";}?>

<div class="container mregister">

<div id="login">
    <H1>REGISTRAR</H1>
    <form name="registerform" id="registerform" action="registrar.php"method="post">
<p>
     <label for="user login">NOMBRE DE USUARIO<br>
     <input type="text" name="fullname" id="fullname" class="input" size="32" value=""/> </label>

</p>
<p>
     <label for="user pass">E-MAIL<br>
     <input type="email" name="email" id="email" class="input" size="32" value=""/> </label>

</p>
<p>
     <label for="user pass">CONTRASEÑA<br>
     <input type="password" name="password" id="password" class="input" size="32" value=""/> </label>

</p>
<p class="submit">
     <input type="submit" name="register" id="register" class="button" value="Registrar"/>
</p>
<p class= "regtext">Ya tienes cuenta? <a href= "ingresar.php"> entra aqui!</a></p>
    </form>
</div>




</div>









<?php include("template/pie.php");?>