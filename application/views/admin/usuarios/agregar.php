<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Agregar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6">

                        <!-- Formulario Agregar -->
                        <form action="<?php echo base_url();?>admin/Cusuarios/insertar" method="POST">
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" id="nombres" name="nombres" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="text" id="telefono" name="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Usuario:</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rol">Roles:</label>
                                <select name="rol" id="rol" class="form-control">
                                    <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id;?>"><?php echo $rol->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-flat" value="Guardar">
                                <a href="<?php echo base_url();?>admin/Cusuarios" class="btn btn-danger btn-flat pull-right"> <span class="fa fa-reply"></span> Regresar</a>
                            </div>
                           
                        </form>
                       <!-- Formulario Agregar -->

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->