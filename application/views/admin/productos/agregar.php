<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Productos
                <small>/ Agregar</small>
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

                                <form action="<?php echo base_url();?>mantenimiento/Cproductos/insertar" method="POST">

                                    <div class="form-group <?php echo !empty(form_error("nombre"))? 'has-error': ''; ?>">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre') ?>">
                                        <?php echo form_error("nombre","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("descripcion"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Descripcion:</label>
                                        <input type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion') ?>">
                                        <?php echo form_error("descripcion","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("precio"))? 'has-error': ''; ?>">
                                        <label for="precio">Precio:</label>
                                        <input type="text" class="form-control" name="precio" value="<?php echo set_value('precio') ?>">
                                        <?php echo form_error("precio","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("stock"))? 'has-error': ''; ?>">
                                        <label for="stock">stock:</label>
                                        <input type="text" class="form-control" name="stock" value="<?php echo set_value('stock') ?>">
                                        <?php echo form_error("stock","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Categoria:</label>

                                        <select name="categoria" id="categoria" class="form-control">
                                            <?php foreach ($categorias as $cat):?> 
                                                <option value="<?php echo $cat->id; ?>">
                                                    <?php echo $cat->nombre; ?>
                                                </option>
                                             <?php endforeach; ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a href="<?php echo base_url();?>mantenimiento/CProductos" class="btn btn-danger btn-flat pull-right">Regresar</a>
                                    </div>
                                </form>
                               
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