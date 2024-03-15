<?php 
include("../../bd.php");

//RECEPCION DEL ID PARA CONSULTAR LOS REGISTROS
if(isset( $_GET['txtID'] )){

   
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";


   
    $sentencia=$conexion->prepare("SELECT * FROM tbl_tituladas WHERE id=:id");
    
    $sentencia->bindParam(":id",$txtID);
    
    $sentencia->execute();

    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombretitulada=$registro["nombretitulada"];
    
}
if($_POST){
   
    
    
      //se recolecto los datos del metodo post//
      $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";

      $nombretitulada=(isset($_POST["nombretitulada"])?$_POST["nombretitulada"]:"");
    
      //preparar la insercion de los datos
      $sentencia=$conexion->prepare("UPDATE tbl_tituladas SET nombretitulada=:nombretitulada WHERE id=:id");
    
      //asignacion valores que vienen del metodo post (los del formulario)
      $sentencia->bindParam(":nombretitulada",$nombretitulada);
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
      $mensaje="Titulada actualizada";


      //redireccion
      header("Location:index.php?mensaje=".$mensaje);
      
    }

?>

<?php include("../../templates/header.php"); ?>

<br />

<div class="card">
    <div class="card-header">
        Tituladas:
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">


            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID;?>" class="form-control" readonly name="txtID" id="txtID"
                    aria-describedby="helpId" placeholder="ID">

            </div>

            <div class="mb-3">
                <label for="nombretitulada" class="form-label">Nombre de titulada:</label>
                <input type="text" value="<?php echo $nombretitulada;?>" class="form-control" name="nombretitulada"
                    id="nombretitulada" aria-describedby="helpId" placeholder="Nombre de titulada">

            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php include("../../templates/footer.php"); ?>