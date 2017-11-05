<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Clientes
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
                                <form action="<?php echo base_url();?>mantenimiento/Cclientes/insertar" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" name="nombres">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Apellidos:</label>
                                        <input type="text" class="form-control" name="apellidos">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Telefono:</label>
                                        <input type="text" class="form-control" name="telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Ruc:</label>
                                        <input type="text" class="form-control" name="ruc">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Empresa:</label>
                                        <input type="text" class="form-control" name="empresa">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a href="<?php echo base_url();?>mantenimiento/Cclientes" class="btn btn-danger btn-flat">Regresar</a>
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