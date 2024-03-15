<?php 
include("../../bd.php"); 


//INSTRUCCION DE BORRAR//

if(isset( $_GET['txtID'] )){

    //almacenar el id
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";


    //instruccion sql
    $sentencia=$conexion->prepare("DELETE FROM tbl_talento WHERE id=:id");
    //parametro para el borrado
    $sentencia->bindParam(":id",$txtID);
    //borrado
    $sentencia->execute();
    //redireccion
    $mensaje="Estudiante eliminado";


    //redireccion
    header("Location:index.php?mensaje=".$mensaje);
}


$sentencia=$conexion->prepare("SELECT *,(SELECT nombretitulada FROM tbl_tituladas WHERE tbl_tituladas.id=tbl_talento.idtitulada limit 1) as titulada 
FROM `tbl_talento`");
$sentencia->execute();
$lista_tbl_talento=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?>

<link rel="stylesheet" href="../../secciones/software/stylo.css">
<br />


<div>
    <div>
        <a href="../../secciones/productiva/titu.php"><button class="btn btn-outline-success"
                type="button">Volver</button></a>
    </div>
    <br>

    <div class="instructor">

        <div class="card" style="width: 11rem;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-350 0 1248 472">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z" />
            </svg>

            <div class="card-body">
                <a name="" id="" class="btn btn-outline-info" href="./instructor7/index.php" role="button">Ver Instructor(a)</a>
            </div>
        </div>



    </div>

</div>
<br>
<h3>Aprendices Talento Humano</h3>
<div class="card">
    <div class="card-header">

        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Aprendiz</a>
    </div>
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ficha</th>
                        <th scope="col">Numero Documento</th>
                        <th scope="col">Titulada</th>
                        <th scope="col">Fecha de ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($lista_tbl_talento as $registro) { ?>


                    <tr class="">
                        <td><?php echo $registro['id'] ?> </td>
                        <td scope="row">
                            <?php echo $registro['primernombre'];?>
                            <?php echo $registro['segundonombre'];?>
                            <?php echo $registro['primerapellido'];?>
                            <?php echo $registro['segundoapellido'];?></td>
                        <td><?php echo $registro['foto'] ?></td>
                        <td><?php echo $registro['cc'] ?> </td>
                        <td><?php echo $registro['titulada'] ?> </td>
                        <td><?php echo $registro['fechadeingreso'] ?> </td>

                        <td>
                            <a class="btn btn-success" href="editar.php?txtID=<?php echo $registro['id'] ?>"
                                role="button">Editar</a>

                            <a class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id']; ?>);"
                                role="button">Eliminar</a>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>




    </div>
</div>

<?php include("../../templates/footer.php"); ?>