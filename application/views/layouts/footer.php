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

    //-----------------------------------------------------------------------------------------
    // Mensages de Alerta Cerrar fadeTo(speed, opacity) / slideUp(slow - 400 milliseconds,fast)
    $(".alert-success").fadeTo(6000, 0.1).slideUp("slow", function(){
        $(".alert-success").slideUp("slow");
    });
    //-----------------------------------------------------------------------------------------


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
        //alert(cliente);

        let dataCliente = cliente.split("*");

        p ="<h4><strong>Nombre: </strong> <span class='label label-primary'> "+dataCliente[1]+"</span></h4>"
        p +="<h4><strong>Tipo de Cliente: </strong> <span class='label label-primary'>"+dataCliente[2]+"</span></h4>"
        p +="<h4><strong>Tipo de Doc.: </strong> <span class='label label-primary'>"+dataCliente[3]+"</span></h4>"
        p +="<h4><strong>Num de Doc.: </strong> <span class='label label-primary'>"+dataCliente[4]+"</span></h4>"
        p +="<h4><strong>Telefono: </strong> <span class='label label-primary'>"+dataCliente[5]+"</span></h4>"
        p +="<h4><strong>Dirección: </strong> <span class='label label-primary'>"+dataCliente[6]+"</span></h4>"

        $("#modal-default .modal-body").html(p);

    });



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
        //alert(producto);

        let dataProducto = producto.split("*");
        p ="<h3>Codigo:  <span class='label label-success'>"+dataProducto[1]+"</span></h3>"
        p +="<h3>Nombre:  <span class='label label-success'>"+dataProducto[2]+"</span></h3>"
        p +="<h3>Descripcion:  <span class='label label-success'>"+dataProducto[3]+"</span></h3>"
        p +="<h3>Precio:  <span class='label label-success'>"+dataProducto[4]+"</span></h3>"
        p +="<h3>Stock:  <span class='label label-success'>"+dataProducto[5]+"</span></h3>"
        p +="<h3>Categoria:  <span class='label label-success'>"+dataProducto[6]+"</span></h3>"


        $("#modal-default .modal-body").html(p);

    });


    /*Metodo Ajax para eliminar la producto*/ 
    $(".btn-deletep").on("click",function(e){

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
    /****************** FIN PRODUCTO **********************/
    /******************************************************/



    /******************************************************/
    /************************ VENTAS **********************/
    /******************************************************/


    //paso los datos del select a los inputs
   $("#comprobantes").on("change",function(){

        option = $(this).val();

        if(option != ""){

            infoComprobante = option.split("*");

            //ocultos hidden
            $("#idcomprobante").val(infoComprobante[0]);
            $("#igv").val(infoComprobante[2]);

            $("#serie").val(infoComprobante[3]);
            $("#numero").val(numeroComprobante(infoComprobante[1]));
            
        }else{

            $("#idcomprobante").val(null);
            $("#igv").val(null);

            $("#serie").val(null);
            $("#numero").val(null);

        }
   });

   // Pasa los datos del Modal al input
   $(document).on("click",".btn-add",function(){

        cliente = $(this).val();
        infoCliente = cliente.split("*");

        $("#idcliente").val(infoCliente[0]);
        $("#cliente").val(infoCliente[1]);
        $("#modal-default").modal("hide");

   }) 

    /******************************************************/
    /************************FIN  VENTAS ******************/
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


//Se evalua de la cantidad de "n" comprobates registrados
// boleta = 1
// factura = 0
function numeroComprobante(n){

    if (n >= 99999 && n < 99999) {
        return Number(n)+1;
    }
    if (n >= 9999 && n < 99999) {
        return "0" + (Number(n)+1);
    }
    if (n >= 999 && n < 9999) {
        return "00" + (Number(n)+1);
    }
    if (n >= 99 && n < 999) {
        return "0000" + (Number(n)+1);
    }
    if (n >= 9 && n < 99) {
        return "0000" + (Number(n)+1);
    }
    if (n < 9) {
        return "00000" + (Number(n)+1);
    }    
}

</script>
</body>
</html>
