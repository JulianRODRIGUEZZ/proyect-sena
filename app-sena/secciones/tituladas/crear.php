<?php 
include("../../bd.php"); 

if($_POST){
print_r($_POST);


  //se recolecto los datos del metodo post//
  $nombretitulada=(isset($_POST["nombretitulada"])?$_POST["nombretitulada"]:"");

  //preparar la insercion de los datos
  $sentencia=$conexion->prepare("INSERT INTO tbl_tituladas(id,nombretitulada)
      VALUES (NULL, :nombretitulada)");

  //asignacion valores que vienen del metodo post (los del formulario)
  $sentencia->bindParam(":nombretitulada",$nombretitulada);
  $sentencia->execute();
  $mensaje="Titulada agregada";


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
                <label for="nombretitulada" class="form-label">Nombre de titulada:</label>
                <input type="text" class="form-control" name="nombretitulada" id="nombretitulada"
                    aria-describedby="helpId" placeholder="Nombre de titulada">

            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>




<?php include("../../templates/footer.php"); ?>