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

    /******************************************************/
    /*******************  CATEGORIA ***********************/
    /******************************************************/


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

    /******************************************************/
    /*******************  FIN CATEGORIA *******************/
    /******************************************************/


    

    /******************************************************/
    /********************  CLIENTE ************************/
    /******************************************************/

    $(".btn-viewc").on("click",function(){

        let cliente = $(this).val();
        alert(cliente);

        let dataCliente = cliente.split("*");

        p ="<p><strong>Nombre: </strong>"+dataCliente[1]+"</p>"
        p +="<p><strong>Apellidos: </strong>"+dataCliente[2]+"</p>"
        p +="<p><strong>Telefono: </strong>"+dataCliente[3]+"</p>"
        p +="<p><strong>Direccion: </strong>"+dataCliente[4]+"</p>"
        p +="<p><strong>Ruc: </strong>"+dataCliente[5]+"</p>"
        p +="<p><strong>Empresa: </strong>"+dataCliente[6]+"</p>"

        $("#modal-default .modal-body").html(p);

    })



    /*Metodo Ajax para obtener la info de la  Categoria*/ 
    /*var base_url = "<?php //echo base_url(); ?>";

    $(".btn-viewc").on("click",function(){

        let id = $(this).val();

        $.ajax({
            url: base_url+"mantenimiento/Cclientes/view/"+id,
            type: "POST",
            success:function(response){
                $("#modal-default .modal-body").html(response);
                //alert(response);

            }
        });
    });*/

    /*Metodo Ajax para eliminar la cliente*/ 
    $(".btn-deletec").on("click",function(e){

        e.preventDefault();
        let ruta = $(this).attr("href");
        console.log(ruta);    

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

    /******************************************************/
    /******************* FIN CLIENTE **********************/
    /******************************************************/


    /******************************************************/
    /********************  PRODUCTO ************************/
    /******************************************************/

    $(".btn-viewp").on("click",function(){

        let producto = $(this).val();
        alert(producto);

        let dataProducto = producto.split("*");

        p ="<h3>Nombre:  <span class='label label-success'>"+dataProducto[1]+"</span></h3>"
        p +="<h3>Descripcion:  <span class='label label-success'>"+dataProducto[2]+"</span></h3>"
        p +="<h3>Precio:  <span class='label label-success'>"+dataProducto[3]+"</span></h3>"
        p +="<h3>Stock:  <span class='label label-success'>"+dataProducto[4]+"</span></h3>"
        p +="<h3>Categoria:  <span class='label label-success'>"+dataProducto[5]+"</span></h3>"


        $("#modal-default .modal-body").html(p);

    })







    /******************************************************/
    /****************** FIN PRODUCTO **********************/
    /******************************************************/

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

$('[data-toggle="tooltip"]').tooltip();     
    
$('.sidebar-menu').tree()
})
</script>
</body>
</html>
