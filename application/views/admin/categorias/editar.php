<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Categoria
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

                                <form action="<?php echo base_url();?>mantenimiento/Ccategorias/update" method="POST">
                                    <!-- -->   
                                    <input type="hidden" value="<?php echo $categoria->id ?>" name="id">
                                    <div class="form-group <?php echo !empty(form_error("nombre"))? 'has-error': ''; ?>">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo !empty(form_error("nombre"))? set_value('nombre'): $categoria->nombre ;?>">
                                        <?php echo form_error("nombre","<span class='help-block'>","</span>" ); ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="descripcion">Descripcion:</label>
                                        <input type="text" class="form-control" name="descripcion" value="<?php echo $categoria->descripcion ?>">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat" >Actualizar</button>
                                         <a href="<?php echo base_url();?>mantenimiento/Ccategorias" class="btn btn-danger btn-flat pull-right">Regresar</a>
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