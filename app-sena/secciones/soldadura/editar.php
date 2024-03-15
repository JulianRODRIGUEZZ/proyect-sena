<?php 
include("../../bd.php");

//RECEPCION DEL ID PARA CONSULTAR LOS REGISTROS
if(isset( $_GET['txtID'] )){

   
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";


   
    $sentencia=$conexion->prepare("SELECT * FROM tbl_soldadura WHERE id=:id");
    
    $sentencia->bindParam(":id",$txtID);
    
    $sentencia->execute();

    $registro=$sentencia->fetch(PDO::FETCH_LAZY);


    $primernombre=$registro["primernombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];
    $foto=$registro["foto"];
    $cc=$registro["cc"];
    $idtitulada=$registro["idtitulada"];
    $fechadeingreso=$registro["fechadeingreso"];


    $sentencia=$conexion->prepare("SELECT * FROM `tbl_tituladas`");
    $sentencia->execute();
    $lista_tbl_tituladas=$sentencia->fetchALL(PDO::FETCH_ASSOC);
    
}
if($_POST){

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";

    $primernombre=(isset($_POST["primernombre"])?$_POST["primernombre"]:"");
  
    $segundonombre=(isset($_POST["segundonombre"])?$_POST["segundonombre"]:"");
  
    $primerapellido=(isset($_POST["primerapellido"])?$_POST["primerapellido"]:"");
  
    $segundoapellido=(isset($_POST["segundoapellido"])?$_POST["segundoapellido"]:"");
  
    $foto=(isset($_POST["foto"])?$_POST["foto"]:"");
  
    $cc=(isset($_POST["cc"])?$_POST["cc"]:"");
  
    //$foto=(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");
  
    //$cc=(isset($_FILES["cc"]['name'])?$_FILES["cc"]['name']:"");
    
    $idtitulada=(isset($_POST["idtitulada"])?$_POST["idtitulada"]:"");
  
    $fechadeingreso=(isset($_POST["fechadeingreso"])?$_POST["fechadeingreso"]:"");
  
  
    $sentencia=$conexion->prepare(" 
    UPDATE tbl_soldadura 
    SET
     primernombre=:primernombre,
     segundonombre=:segundonombre,
     primerapellido=:primerapellido,
     segundoapellido=:segundoapellido,
     foto=:foto,
     cc=:cc,
     idtitulada=:idtitulada,
     fechadeingreso=:fechadeingreso
    WHERE id=:id
    ");
  
  $sentencia->bindParam(":primernombre",$primernombre);

  $sentencia->bindParam(":segundonombre",$segundonombre);

  $sentencia->bindParam(":primerapellido",$primerapellido);

  $sentencia->bindParam(":segundoapellido",$segundoapellido);

  $sentencia->bindParam(":foto",$foto);

  $sentencia->bindParam(":cc",$cc);

  $sentencia->bindParam(":idtitulada",$idtitulada);

  $sentencia->bindParam(":fechadeingreso",$fechadeingreso);

  $sentencia->bindParam(":id",$txtID);

  $sentencia->execute();
  $mensaje="Aprendiz actualizado";


    //redireccion
    header("Location:index.php?mensaje=".$mensaje);
  
  
  }

?>
<?php include("../../templates/header.php"); ?>
</br>

<div class="card">
    <div class="card-header">
        Agregar datos del aprendiz
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multiplart/form-data">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID;?>" class="form-control" readonly name="txtID" id="txtID"
                    aria-describedby="helpId" placeholder="ID">

            </div>

            <div class="mb-3">
                <label for="primernombre" class="form-label">primer nombre</label>
                <input type="text" value="<?php echo $primernombre;?>" class="form-control" name="primernombre"
                    id="primernombre" aria-describedby="helpId" placeholder="primer nombre">

            </div>

            <div class="mb-3">
                <label for="segundonombre" class="form-label">Segundo Nombre</label>
                <input type="text" value="<?php echo $segundonombre;?>" class="form-control" name="segundonombre"
                    id="segundonombre" aria-describedby="helpId" placeholder="Segundo nombre">

            </div>

            <div class="mb-3">
                <label for="primerapellido" class="form-label">Primer apellido</label>
                <input type="text" value="<?php echo $primerapellido;?>" class="form-control" name="primerapellido"
                    id="primerapellido" aria-describedby="helpId" placeholder="Primer apellido">

            </div>

            <div class="mb-3">
                <label for="segundoapellido" class="form-label">Segundo apellido</label>
                <input type="text" value="<?php echo $segundoapellido;?>" class="form-control" name="segundoapellido"
                    id="segundoapellido" aria-describedby="helpId" placeholder="Segundo apellido">

            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">FIcha</label>
                <input type="text" value="<?php echo $foto;?>" class="form-control" name="foto" id="foto"
                    aria-describedby="helpId" placeholder="Numero ficha">

            </div>

            <div class="mb-3">
                <label for="cc" class="form-label">Numero Documento</label>
                <input type="text" value="<?php echo $cc;?>" class="form-control" name="cc" id="cc"
                    aria-describedby="helpId" placeholder="Ingresa numero documento">

            </div>

            <div class="mb-3">
                <label for="idtitulada" class="form-label">Titulada:</label>

                <select class="form-select form-select-sm" name="idtitulada" id="idtitulada">

                    <?php foreach ($lista_tbl_tituladas as $registro) { ?>


                    <option <?php echo ($idtitulada== $registro['id'])?"selected":"";?>
                        value="<?php echo $registro['id']?>">
                        <?php echo $registro['nombretitulada'] ?></option>

                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso:</label>
                <input type="date" value="<?php echo $fechadeingreso;?>" class="form-control" name="fechadeingreso"
                    id="fechadeingreso" aria-describedby="emailHelpId" placeholder="Fecha de ingreso">

            </div>

            <button type="submit" class="btn btn-success">Actualizar registro</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>





        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>