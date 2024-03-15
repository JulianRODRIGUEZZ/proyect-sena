<?php 
include("../../bd.php"); 

if($_POST){
  

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


  $sentencia=$conexion->prepare("INSERT INTO 
  `tbl_soldadura` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cc`, `idtitulada`, `fechadeingreso`) 
  VALUES (NULL,:primernombre,:segundonombre,:primerapellido,:segundoapellido,:foto,:cc,:idtitulada,:fechadeingreso);");

$sentencia->bindParam(":primernombre",$primernombre);
$sentencia->bindParam(":segundonombre",$segundonombre);
$sentencia->bindParam(":primerapellido",$primerapellido);
$sentencia->bindParam(":segundoapellido",$segundoapellido);

$sentencia->bindParam(":foto",$foto);
$sentencia->bindParam(":cc",$cc);

//$fecha_foto=new DateTime();

//$nombreArchivo_foto=($foto!='')?$fecha_foto->getTimestamp()."_".$_FILES["foto"]['name']


//$sentencia->bindParam(":foto",$foto);
//$sentencia->bindParam(":cc",$cc);


$sentencia->bindParam(":idtitulada",$idtitulada);
$sentencia->bindParam(":fechadeingreso",$fechadeingreso);

$sentencia->execute();
$mensaje="Aprendiz agregado";


    //redireccion
    header("Location:index.php?mensaje=".$mensaje);


}

$sentencia=$conexion->prepare("SELECT * FROM `tbl_tituladas`");
$sentencia->execute();
$lista_tbl_tituladas=$sentencia->fetchALL(PDO::FETCH_ASSOC);


?>

<?php include("../../templates/header.php"); ?>
<br />
<div class="card">
    <div class="card-header">
        Agregar Datos del Aprendiz
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multiplart/form-data">

            <div class="mb-3">
                <label for="primernombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" name="primernombre" id="primernombre" aria-describedby="helpId"
                    placeholder="primer nombre">

            </div>

            <div class="mb-3">
                <label for="segundonombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" name="segundonombre" id="segundonombre"
                    aria-describedby="helpId" placeholder="Segundo nombre">

            </div>

            <div class="mb-3">
                <label for="primerapellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primerapellido" id="primerapellido"
                    aria-describedby="helpId" placeholder="Primer apellido">

            </div>

            <div class="mb-3">
                <label for="segundoapellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundoapellido" id="segundoapellido"
                    aria-describedby="helpId" placeholder="Segundo apellido">

            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">FIcha</label>
                <input type="text" class="form-control" name="foto" id="foto" aria-describedby="helpId"
                    placeholder="Numero ficha">

            </div>

            <div class="mb-3">
                <label for="cc" class="form-label">Numero Documento</label>
                <input type="text" class="form-control" name="cc" id="cc" aria-describedby="helpId"
                    placeholder="Ingresa numero documento">

            </div>

            <div class="mb-3">
                <label for="idtitulada" class="form-label">Tituladas:</label>
                <select class="form-select form-select-sm" name="idtitulada" id="idtitulada">

                    <?php foreach ($lista_tbl_tituladas as $registro) { ?>


                    <option value="<?php echo $registro['id']?>">
                        <?php echo $registro['nombretitulada'] ?></option>

                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso:</label>
                <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso"
                    aria-describedby="emailHelpId" placeholder="Fecha de ingreso">

            </div>



            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>







        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>



<?php include("../../templates/footer.php"); ?>