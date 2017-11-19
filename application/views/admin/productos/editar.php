<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Productos
                <small> / Editar</small>
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

                                <!-- Formulario Editar -->
                                <form action="<?php echo base_url();?>mantenimiento/Cproductos/update" method="POST">

                                     <input type="hidden" value="<?php echo $productos->id ?>" name="id">

                                    <div class="form-group">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" name="nombres" value="<?php echo $productos->nombre; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion:</label>
                                        <input type="text" class="form-control" name="descripcion" value="<?php echo $productos->descripcion; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Precio:</label>
                                        <input type="text" class="form-control" name="precio" value="<?php echo $productos->precio;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Stock:</label>
                                        <input type="text" class="form-control" name="stock" value="<?php echo $productos->stock; ?>">      
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Categoria:</label>

                                        <select name="categoria" id="categoria" class="form-control">
                                            <?php foreach ($categorias as $cat):?>
                                                <?php if($cat->id == $productos->categoria_id): ?> 
                                                    <option value="<?php echo $cat->id; ?>" selected>
                                                    <?php echo $cat->nombre; ?>
                                                    </option>
                                                <?php else: ?>
                                                    <option value="<?php echo $cat->id; ?>">
                                                    <?php echo $cat->nombre; ?>
                                                    </option>   
                                                <?php endif; ?>

                                             <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a href="<?php echo base_url();?>mantenimiento/Cproductos" class="btn btn-danger btn-flat pull-right">Regresar</a>
                                    </div>
                                </form>
                               <!-- Formulario Editar -->

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