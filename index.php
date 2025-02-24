<?php 
    // require "empleados.php";
    // require "loginback.php";
    // require "registroback.php";

    require "Empleados/empleados.php";
    require "Empleados/loginback.php";
    require "Empleados/registroback.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Gestion de empresa</title>
    <link rel="icon" href="icono.svg">
</head>
<body>
    <div class="container">
    <form action="" method="POST" id="formRegister">

        <!-- Modal -->
        <div class="modal fade" id="exampleModalRegistrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email">Correo:</label>
                    <input type="text" class="form-control" name="email" placeholder="Ingrese su mail" id="email" >
                    <br>
                </div>

                <div class="form-group col-md-12">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control"  name="user" placeholder="Ingrese su contraseña" id="user" >
                    <br>
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control"  name="password" placeholder="Ingrese su contraseña" id="password" >
                    <br>
                </div>

                <div class="form-group col-md-6">
                    <label for="confirm_password">Contraseña:</label>
                    <input type="password" class="form-control"  name="confirm_password" placeholder="Reingrese su contraseña" id="confirm_password" >
                    <br>
                </div>
                
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="register">Registrarse</button>
                <button class="btn btn-primary" type="reset"  id="switchR">Login</button>
            </div>
            </div>
        </div>
        </div>
                    <!-- Button trigger modal -->
    </form>
    <br>

    <form action="" method="POST" id="formLogin">

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email_login">Correo:</label>
                        <input type="email_login" class="form-control"  name="email_login" placeholder="Ingrese su correo" id="email_login" >
                        <br>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="password_login">Contraseña:</label>
                        <input type="password" class="form-control"  name="password_login" placeholder="Ingrese su contraseña" id="password_login" >
                        <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="login">Login</button>
                <button class="btn btn-primary" type="reset"  id="switchL">Registrarse</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <br>

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
                    <select name="Genero" class="form-control"  id="Genero" required>
                        <!-- <option placeholder="Seleccionar"><//?php if(isset($_POST['Genero'])){echo $_POST['Genero'];}else{echo "Seleccionar";}?></option> -->
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
                        <img class="img-thumbnail rounded mx-auto d-block" src="Imagenes/<?php echo $Foto; ?>" width="100px">
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
        <?php if(isset($_SESSION['email'])) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar un registro +
            </button>            
            <a href="Empleados/logout.php" class="btn btn-danger">Logout</a>
            <p>Usuario conectado: <?php echo $_SESSION['email'] ?></p>
        <?php }else{ ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" id="ModalLogin">
                Identificarse
            </button>
        <?php } ?>
    </form>
    <br>
         
        <?php
            $TAMANO_PAGINA = 3; 

            //examino la página a mostrar y el inicio del registro a mostrar 
            $pagina = 1;
            $inicio = 0;

            if(isset($_GET["pagina"])){
                $pagina = $_GET["pagina"];
                $inicio = ($pagina - 1) * $TAMANO_PAGINA;
            }

            $rs = $pdo->prepare("SELECT * FROM `empleados` WHERE 1");
            $rs->execute();
            $num_total_registros = $rs->rowCount();
            // print_r($num_total_registros);

            $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
        
        ?>
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
                    $sql_2= "SELECT * FROM empleados LIMIT $inicio , $TAMANO_PAGINA";
                    $pag = $pdo->prepare($sql_2);
                    $pag->execute();

                    while($fila = $pag->fetchAll(PDO::FETCH_ASSOC)){
                    foreach($fila as $empleado){ ?>
                    <tr>
                        <td><img class="img-fluid" width="100px" src="Imagenes/<?php echo $empleado['Foto'];?>"></td>
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
                                <?php if(isset($_SESSION['email'])){?>
                                    <input type="submit" value="Seleccionar" <?php echo $btnSeleccionar; ?> class="btn btn-secundary" name="accion">
                                <?php }else{ ?>
                                    <p>Identificarse</p>
                                <?php } ?>
                            </form>
                        </td>
                    </tr>
                <?php }}
                ?>
            </table>
            <?php 
                  if ($total_paginas > 1){ 
                    for ($i=1;$i<=$total_paginas;$i++){ 
                       if ($pagina == $i) 
                          echo "<a class='page-link'>".$pagina."</a>"; 
                       else 
                          echo "<a href='index.php?pagina=". $i ."' class='page-link'>" . $i . "</a> "; 
                    } 
                } 
            ?>
        </div>
        <?php if(isset($mensaje)){
            echo $mensaje;
        } ?>
        <div class="d-flex justify-content-center" style="margin-bottom: 10px;">
            <form action="" method="POST" >
                <div class="btn-group ">
                    <input type="text" name="buscador" id="buscador" placeholder="Buscar empleado" class="form-control">
                </div>
            </form>
        </div>
        
        <div>
            <div class='row' id='tabla_resultados'></div>          
        </div>
    </div>
<script src="jquery.js"></script>
<?php if($mostrarModal){ ?>
    <script>
        $('#exampleModal').modal('show');
    </script>
<?php } ?>
<?php if($mostrarModalRegister){?>
    <script>
        $('#exampleModalRegistrarse').modal('show');
    </script>
<?php } ?>
<?php if($mostrarModalLogin){ ?>
    <script>
        $('#exampleModalLogin').modal('show');
    </script>
<?php } ?>
</body>
</html>