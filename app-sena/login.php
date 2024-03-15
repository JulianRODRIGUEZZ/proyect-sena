<?php
session_start();
if($_POST){
    include("./bd.php");


    $sentencia=$conexion->prepare("SELECT *,count(*) as n_usuario
   FROM `tbl_usuarios` 
   WHERE usuario=:usuario
   AND password=:password");

    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];


    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $contrasenia);

    $sentencia->execute();

    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    if($registro["n_usuario"]>0){

      $_SESSION['usuario']=$registro["usuario"];
      $_SESSION['logueado']=true;
      header("Location:index.php");
    }else{
      $mensaje="Error: Usuario o contraseña son invalidos";


    }


}
?>

<!doctype html>
<html lang="en">

<head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <link rel="stylesheet" href="templates/stylo.css">

</head>

<body>
    <header>
        
    </header>


    <main class="container">





        <div id="form-ui">
            <form action="" method="post" id="form">
                <div id="form-body">



                    <?php if(isset($mensaje)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje;?></strong>
                    </div>
                    <?php } ?>



                    <div id="">

                        <div id="welcome-line-1">Inicia Sesion</div>

                    </div>
                    <div id="input-area">
                        <div class="form-inp">
                            <input placeholder="Usuario" type="text" name="usuario" id="usuario">
                        </div>
                        <div class="form-inp">
                            <input placeholder="Password" type="password" name="contrasenia" id="contrasenia">
                        </div>
                    </div>
                    <div id="submit-button-cvr">
                        <button id="submit-button" type="submit">Login</button>
                    </div>
                    <div id="forgot-pass">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div id="bar"></div>
                </div>
            </form>
        </div>


      

        </div>
        </div>

        </div>







    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>