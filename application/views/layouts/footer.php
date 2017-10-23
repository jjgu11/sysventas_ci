        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2017 <a href="https://adminlte.io">Jcheck AporteFree</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function () {

    /*Metodo Ajax para obtener la info de la  Categoria*/ 
    var base_url = "<?php echo base_url(); ?>";

    $(".btn-view").on("click",function(){

        let id = $(this).val();

        $.ajax({
            url: base_url+"mantenimiento/Ccategorias/view/"+id,
            type: "POST",
            success:function(response){
                $("#modal-default .modal-body").html(response);
                //alert(response);

            }
        });
    });
    /* Fin Ajax*/


    /*Metodo Ajax para eliminar la Categoria*/ 
    $(".btn-delete").on("click",function(e){

        e.preventDefault();
        let ruta = $(this).attr("href");    

        $.ajax({
            url: ruta,
            type: "POST",
            success:function(response){
                window.location.href= base_url+response;
                //console.log(response);
            }
        });
    });
    /* Fin Ajax*/

	$('#example1').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    
$('.sidebar-menu').tree()
})
</script>
</body>
</html>
