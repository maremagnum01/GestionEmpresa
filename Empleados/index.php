<?php 
    require 'empleados.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/poppers.js/1.12.9/udm/popper.min.js" > </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>
    <title>Gestion de empresa</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" >

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Empleados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                <input type="hidden" required name="txtID" placeholder=""  value="<?php echo $txtID; ?>" id="txtID">

                <div class="form-group col-md-4">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":""; ?>" name="txtNombre" placeholder="Nombre" value="<?php echo $txtNombre; ?>"id="txtNombre">
                    <div class="invalid-feedback">
                        <?php echo (isset($error['Nombre']))?$error['Nombre']:"" ?>
                    </div>
                    <br>
                </div>

                <div class="form-group col-md-4">
                    <label for="txtApellido">Apellido:</label>
                    <input type="text" class="form-control <?php echo (isset($error['Apellido']))?"is-invalid":""; ?>"  name="txtApellido" placeholder="Apellido"  value="<?php echo $txtApellido; ?>"id="txtApellido">
                    <div class="invalid-feedback">
                        <?php echo (isset($error['Apellido']))?$error['Apellido']:"" ?>
                    </div>
                    <br>
                </div>

                <div class="form-group col-md-4">
                    <label for="Genero">Genero:</label>
                    <select name="Genero" class="form-control"  id="Genero">
                        <option><?php if(isset($_POST['Genero'])){echo $_POST['Genero'];}else{echo "Seleccionar";}?></option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="No binario">No binario</option>
                    </select>
                    <br>
                </div>

                <div class="form-group col-md-12">
                    <label for="txtCorreo">Correo:</label>
                    <input type="email" class="form-control <?php echo (isset($error['Correo']))?"is-invalid":""; ?>"  name="txtCorreo" placeholder="Escriba un correo" value="<?php echo $txtCorreo; ?>" id="txtCorreo">
                    <div class="invalid-feedback">
                        <?php echo (isset($error['Correo']))?$error['Correo']:"" ?>
                    </div>
                    <br>
                </div>

                <div class="form-group col-md-12">
                    <label for="Foto">Foto:</label>

                    <?php if($Foto!=""){ ?>
                        <br>
                        <img class="img-thumbnail rounded mx-auto d-block" src="../Imagenes/<?php echo $Foto; ?>" width="100px">
                        <br>
                    <?php }?>
                    <br>
                    <input type="file" class="form-control"  accept="image/*" name="Foto" value="<?php echo $txtFoto ?>" id="Foto" >
                    <br>
                </div>

                </div>
            </div>
            <div class="modal-footer">
                <button value="btnAgregar" <?php echo $btnAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                <button value="btnModificar" <?php echo $btnModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                <button value="btnEliminar" <?php echo $btnEliminar; ?> class="btn btn-danger" type="submit" name="accion" onclick="return confirm('¿Deseas eliminar este registro?')">Eliminar</button>
                <button value="btnCancelar" <?php echo $btnCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
            </div>
            </div>
        </div>
        </div>
                    <!-- Button trigger modal -->
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar un registro +
        </button>
        </form>
        <br>
        <div class="row">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre completo</th>
                        <th>Genero</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php 
                    foreach($listaEmpleados as $empleado){ ?>
                    <tr>
                        <td><img class="img-fluid" width="100px" src="../Imagenes/<?php echo $empleado['Foto'];?>"></td>
                        <td>
                            <?php echo $empleado['Nombre']; ?> 
                            <?php echo $empleado['Apellidos']; ?>
                        </td>
                        <td><?php echo $empleado['Genero']; ?></td>
                        <td><?php echo $empleado['Correo']; ?></td>
                        <td>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="txtID" value="<?php echo $empleado['ID']; ?>">
                                <input type="hidden" name="txtNombre" value="<?php echo $empleado['Nombre']; ?>">
                                <input type="hidden" name="txtApellido" value="<?php echo $empleado['Apellidos']; ?>">
                                <input type="hidden" name="Genero" value="<?php echo $empleado['Genero']; ?>">
                                <input type="hidden" name="txtCorreo" value="<?php echo $empleado['Correo']; ?>">
                                <input type="hidden" name="Foto" value="<?php echo $empleado['Foto']; ?>">

                                <input type="submit" value="Seleccionar" class="btn btn-secundary" name="accion">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php if(isset($mensaje)){
            echo $mensaje;
        } ?>
    </div>
<?php if($mostrarModal){ ?>
    <script>
        $('#exampleModal').modal('show');
    </script>
<?php } ?>
</body>
</html>