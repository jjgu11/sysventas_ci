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
                                
                                <?php if($this->session->flashdata("bien")):?>

                                <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("bien") ?></p>   
                                </div>
                                <?php endif; ?>

                                <!-- Formulario Agregar -->
                                <form action="<?php echo base_url();?>mantenimiento/Cclientes/update" method="POST">

                                     <input type="hidden" value="<?php echo $cliente->id ?>" name="id">

                                     <div class="form-group <?php echo !empty(form_error("nombres"))? 'has-error': ''; ?>">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" name="nombres" value="<?php echo form_error("nombres") != false ? set_value("nombres") : $cliente->nombres ?>">
                                        <?php echo form_error("nombres","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("tipo_cliente"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Tipo Cliente:</label>

                                        <select name="tipo_cliente" id="" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <?php if (form_error("tipo_cliente") != false  || set_value("tipo_cliente") != false): ?>
                                                <?php foreach ($tipoClientes as $tp):?>
                                                    <option value="<?php echo $tp->id; ?>" <?php echo set_select("tipo_cliente",$tp->id);?>>
                                                        <?php echo $tp->nombre; ?>
                                                    </option>
                                                 <?php endforeach; ?>
                                             <?php else: ?>
                                                <?php foreach ($tipoClientes as $tp):?>
                                                    <option value="<?php echo $tp->id; ?>" <?php echo $tp->id == $cliente->tipo_cli_id ? 'selected' : ''; ?> >
                                                        <?php echo $tp->nombre; ?>
                                                    </option>
                                                 <?php endforeach; ?>                                            
                                            <?php endif; ?>
                                        </select>
                                        <?php echo form_error("tipo_cliente","<span class='help-block'>","</span>" ); ?>

                                    </div>


                                    <div class="form-group <?php echo !empty(form_error("tipo_documento"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Tipo Documento:</label>

                                        <select name="tipo_documento" id="" class="form-control">
                                            <option value="">Seleccione...</option>  
                                            <?php if (form_error("tipo_documento") != false  || set_value("tipo_documento") != false): ?>
                                                <?php foreach ($tipoDocumentos as $td):?>
                                                    <option value="<?php echo $td->id; ?>" <?php echo set_select("tipo_cliente",$td->id);?>>
                                                        <?php echo $td->nombre; ?>
                                                    </option>
                                                 <?php endforeach; ?>
                                             <?php else: ?>
                                                <?php foreach ($tipoClientes as $td):?>
                                                    <option value="<?php echo $td->id; ?>" <?php echo $td->id == $cliente->tipo_doc_id ? 'selected' : ''; ?> >
                                                        <?php echo $td->nombre; ?>
                                                    </option>
                                                 <?php endforeach; ?>                                            
                                            <?php endif; ?>
                                        </select>
                                        <?php echo form_error("tipo_documento","<span class='help-block'>","</span>" ); ?>

                                    </div>
                                    
                                    <div class="form-group <?php echo !empty(form_error("num_documento"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Num Documento:</label>
                                        <input type="text" class="form-control" name="num_documento" value="<?php echo form_error("num_documento") != false ? set_value("num_documento") : $cliente->num_doc ?>">
                                        <?php echo form_error("num_documento","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("telefono"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Telefono:</label>
                                        <input type="text" class="form-control" name="telefono" value="<?php echo form_error("telefono") != false ? set_value("telefono") : $cliente->telefono ?>">
                                        <?php echo form_error("telefono","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("direccion"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php echo form_error("direccion") != false ? set_value("direccion") : $cliente->direccion ?>">
                                        <?php echo form_error("direccion","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat"><span class="fa  fa-refresh"></span> Guardar</button>
                                        <a href="<?php echo base_url();?>mantenimiento/Cclientes" class="btn btn-danger btn-flat pull-right"><span class="fa  fa-reply"></span> Regresar</a>
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