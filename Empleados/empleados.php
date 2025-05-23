<?php
    include('conexion_db_host.php');
    // include ('conexion.php');

    session_start();
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtApellido=(isset($_POST['txtApellido']))?$_POST['txtApellido']:"";
    $Genero=(isset($_POST['Genero']))?$_POST['Genero']:"";
    $txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
    $Foto=(isset($_FILES['Foto']["name"]))?$_FILES['Foto']["name"]:"imagen.jpg";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    $btnSeleccionar = "disabled";
    if (isset($_SESSION['email'])){
        $btnSeleccionar = "";
    }
    $btnAgregar="";
    $btnModificar=$btnEliminar=$btnCancelar="disabled";
    $mostrarModal=false;

    //validacion 
    $error = array();

    switch($accion){
        case "btnAgregar":

            if($txtNombre ==""){
                $error['Nombre'] = "Escribe un nombre";
            }
            if($txtApellido ==""){
                $error['Apellido'] = "Escribe un Apellido";
            }
            if($txtCorreo ==""){
                $error['Correo'] = "Escribe un Correo";
            }            
            if(count($error)>0){
                $mostrarModal = true;
                break;
            }

            
            $sql_bind=$pdo->prepare("INSERT INTO empleados(Nombre,Apellidos,Genero,Correo,Foto)
             VALUES (:Nombre,:Apellidos,:Genero,:Correo,:Foto)");

            $sql_bind->bindParam(':Nombre',$txtNombre);
            $sql_bind->bindParam(':Apellidos',$txtApellido);
            $sql_bind->bindParam(':Genero',$Genero);
            $sql_bind->bindParam(':Correo',$txtCorreo);

            $fecha = new DateTime();
            $nameFoto = ($Foto!="")?$fecha->getTimestamp()."_".$_FILES["Foto"]["name"]:"imagen.jpg";
            $tmpFoto = $_FILES["Foto"]["tmp_name"];

            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"Imagenes/".$nameFoto);
            }

            $sql_bind->bindParam(':Foto',$nameFoto);
            $sql_bind->execute();
            
            header("Location: index.php?mensaje=1");
        break;

        case "btnModificar":
            $sql_bind=$pdo->prepare("UPDATE empleados SET 
            Nombre=:Nombre, 
            Apellidos=:Apellidos, 
            Genero=:Genero, 
            Correo=:Correo
            WHERE id=:id");

            $sql_bind->bindParam(':Nombre',$txtNombre);
            $sql_bind->bindParam(':Apellidos',$txtApellido);
            $sql_bind->bindParam(':Genero',$Genero);
            $sql_bind->bindParam(':Correo',$txtCorreo);
            $sql_bind->bindParam(':id',$txtID);
            $sql_bind->execute();

            $fecha = new DateTime();
            $nameFoto = ($Foto!="")?$fecha->getTimestamp()."_".$_FILES["Foto"]["name"]:"imagen.jpg";
            $tmpFoto = $_FILES["Foto"]["tmp_name"];

            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"Imagenes/".$nameFoto);

                $sql_bind=$pdo->prepare("SELECT Foto FROM empleados WHERE id=:id");
                $sql_bind->bindParam(':id',$txtID);
                $sql_bind->execute();
                $FotoSelect = $sql_bind->fetch(PDO::FETCH_LAZY);
                // print_r($FotoSelect);

                if(isset($FotoSelect['Foto'])){
                    if(file_exists("Imagenes/".$FotoSelect['Foto'])){
                        if($FotoSelect['Foto']!="imagen.jpg"){
                            unlink("Imagenes/".$FotoSelect['Foto']);
                        }
                    }
                }

                $sql_bind=$pdo->prepare("UPDATE empleados SET Foto=:Foto WHERE id=:id");
                $sql_bind->bindParam(':Foto',$nameFoto);
                $sql_bind->bindParam(':id',$txtID);
                $sql_bind->execute();
            }

            header("Location: index.php?mensaje=2");
        break;

        case "btnEliminar":

            $sql_bind=$pdo->prepare("SELECT Foto FROM empleados WHERE id=:id");
            $sql_bind->bindParam(':id',$txtID);
            $sql_bind->execute();
            $FotoSelect = $sql_bind->fetch(PDO::FETCH_LAZY);
            // print_r($FotoSelect);

            if(isset($FotoSelect['Foto'])&&($FotoSelect['Foto']!="imagen.jpg")){
                if(file_exists("Imagenes/".$FotoSelect['Foto'])){
                    if($FotoSelect['Foto']!="imagen.jpg"){
                        unlink("Imagenes/".$FotoSelect['Foto']);
                    }
                }
            }

            $sql_bind=$pdo->prepare("DELETE FROM empleados WHERE id=:id");
            $sql_bind->bindParam(':id',$txtID);
            $sql_bind->execute();

            header("Location: index.php?mensaje=3");
        break;

        case "btnCancelar":
            header("Location: index.php?mensaje=4");
        break;

        case "Seleccionar":
            $btnAgregar="disabled";
            $btnModificar=$btnEliminar=$btnCancelar="";    
            $mostrarModal=true;
            
            $sql_bind=$pdo->prepare("SELECT Foto FROM empleados WHERE id=:id");
            $sql_bind->bindParam(':id',$txtID);
            $sql_bind->execute();
            $FotoSelect = $sql_bind->fetch(PDO::FETCH_LAZY);
         
            $Foto=$FotoSelect['Foto'];
        break;

        // case "buscador":
        // break;
    }

    //Script para Ajax
    $resultados_empleados ="";
            if(isset($_POST['empleados'])){
                $buscar = $_POST['empleados'];
                $sql_bind = $pdo->prepare("SELECT * FROM empleados WHERE Nombre LIKE '%$buscar%' OR Apellidos LIKE '%$buscar%'");
                $sql_bind->execute();
                $resultado = $sql_bind->fetchAll(PDO::FETCH_ASSOC);
                    
                $rows = $sql_bind->rowCount();
                
                if($rows >= 1){
                        foreach($resultado as $resultados){
                            $resultados_empleados .=
                                "<div class='col-sm d-flex justify-content-around'>
                                    <div class='card' style='width: 10rem;'>
                                        <img src='Imagenes/". $resultados['Foto']."' style='width: 100%; height: 100%; object-fit: contain;' class='card-img-top' alt='...'>
                                        <div class='card-body'>
                                            <p class='card-text'>
                                                ".$resultados['Nombre']."
                                                ".$resultados['Apellidos']."
                                            </p>
                                            <form action='' method='POST' enctype='multipart/form-data'>
                                                <input type='hidden' name='txtID' value='".$resultados['ID']."'>
                                                <input type='hidden' name='txtNombre' value='".$resultados['Nombre']."'>
                                                <input type='hidden' name='txtApellido' value='".$resultados['Apellidos']."'>
                                                <input type='hidden' name='Genero' value='".$resultados['Genero']."'>
                                                <input type='hidden' name='txtCorreo' value='".$resultados['Correo']."'>
                                                <input type='hidden' name='Foto' value='".$resultados['Foto']."'>
        
                                                <input type='submit' ".$btnSeleccionar." value='Seleccionar' class='btn btn-secundary' name='accion' >
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                        }
                } elseif ($_POST['empleados'] != "" ) {
                    echo '<p class="alert alert-warning mt-2 col-12">No se encontraron resultados</p>';
                }
            }
            echo $resultados_empleados;


    error_reporting(0);

    if(isset($_GET['mensaje'])){
        if($_GET['mensaje']=='1'){$mensaje = '<p class="alert alert-success mt-2">¡Agregado a la Base de datos!</p>';}
        if($_GET['mensaje']=='2'){$mensaje = '<p class="alert alert-warning mt-2">¡Modificado correctamente!</p>';}
        if($_GET['mensaje']=='3'){$mensaje = '<p class="alert alert-danger mt-2">¡El registro fue eliminado!</p>';}
        if($_GET['mensaje']=='4'){$mensaje = '<p class="alert alert-primary mt-2">Se cancelo la accion</p>';}
        if($_GET['mensaje']=='5'){$mensaje = '<p class="alert alert-primary mt-2 container">Se encontraron resultados de la busqueda</p>';}
        if($_GET['mensaje']=='6'){$mensaje = '<p class="alert alert-warning mt-2 container">No se encontraron resultados</p>';}
    }
?>

