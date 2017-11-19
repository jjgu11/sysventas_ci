<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Clientes
                <small>Editar</small>
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
                                
                                <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                  <p><i class="icon fa fa-ban"></i><?php $this->session->flashdata("error") ?></p>   
                                </div>

                                <?php endif; ?>

                                <!-- Formulario Agregar -->
                                <form action="<?php echo base_url();?>mantenimiento/Cclientes/update" method="POST">

                                     <input type="hidden" value="<?php echo $cliente->id ?>" name="id">

                                    <div class="form-group">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" name="nombres" value="<?php echo $cliente->nombres; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Apellidos:</label>
                                        <input type="text" class="form-control" name="apellidos" value="<?php echo $cliente->apellidos; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Telefono:</label>
                                        <input type="text" class="form-control" name="telefono" value="<?php echo $cliente->telefono;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php echo $cliente->direccion; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Ruc:</label>
                                        <input type="text" class="form-control" name="ruc" value="<?php echo $cliente->ruc; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Empresa:</label>
                                        <input type="text" class="form-control" name="empresa" value="<?php echo $cliente->empresa; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a href="<?php echo base_url();?>mantenimiento/Cclientes" class="btn btn-danger btn-flat pull-right">Regresar</a>
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