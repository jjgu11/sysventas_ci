<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PERMISOS
        <small>EIDTAR</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>admin/Cpermisos/update/<?php echo $permisos->id  ?>" method="POST">
                            
                            
                            <!-- Paso el id por POST | tambien puedo pasar por GET(ruta URL) -->
                             <input type="hidden" name="id_permiso" value="<?php echo $permisos->id  ?>">

                            <div class="form-group">
                                <label for="rol">Roles:</label>
                                <select name="rol" id="rol" class="form-control" disabled="disabled">
                                    <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id;?>"
                                            <?php echo $rol->id == $permisos->rol_id ? "selected" :""; ?>><?php echo $rol->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="menu">Menus:</label>
                                <select name="menu" id="menu" class="form-control" disabled="disabled">
                                    <?php foreach($menus as $menu):?>
                                        <option value="<?php echo $menu->id;?>"
                                             <?php echo $menu->id == $permisos->menu_id ? "selected" :""; ?>><?php echo $menu->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="read">Leer:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="read" value="1" <?php echo $permisos->read == 1 ? "checked" : ""; ?>>Si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="read" value="0" <?php echo $permisos->read == 0 ? "checked" : ""; ?>>No
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="read">Agregar:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="insert" value="1" <?php echo $permisos->insert == 1 ? "checked" : ""; ?>>Si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="insert" value="0" <?php echo $permisos->insert == 0 ? "checked" : ""; ?>>No
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="read">Editar:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="update" value="1" <?php echo $permisos->update == 1 ? "checked" : ""; ?>>Si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="update" value="0" <?php echo $permisos->update == 0 ? "checked" : ""; ?>>No
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="read">Eliminar:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="delete" value="1" <?php echo $permisos->delete == 1 ? "checked" : ""; ?>>Si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="delete" value="0" <?php echo $permisos->delete == 0 ? "checked" : ""; ?>>No
                                </label>
                            </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Actualizar</button>
                                <a href="<?php echo base_url();?>admin/Cpermisos" class="btn btn-danger btn-flat pull-right"> <span class="fa fa-reply"></span> Regresar</a>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->