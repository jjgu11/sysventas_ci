
$(document).ready(function() {

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
    //var base_url = "<?php echo base_url(); ?>";
    var base_url = "http://localhost:8082/php/sysventas_ci/";

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


    //Sellecciono un  tipo de Comprobante y paso los datos del select a los inputs
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

         sumarVentas();
   });

   // Buscar clientes  del Modal y pasar los datos al input
   $(document).on("click",".btn-modal-add",function(){

        cliente = $(this).val();
        infoCliente = cliente.split("*");

        $("#idcliente").val(infoCliente[0]); // id cliente
        $("#cliente").val(infoCliente[1]); // nombre cliente
        $("#modal-default").modal("hide"); // cierra modal

   });

   // Autocomplete de los productos y btn agregar
   $("#producto").autocomplete({
        source: function(request,response){
            $.ajax({
                url: base_url+"movimiento/Cventas/getProductos",
                type: "POST",
                dataType: "json",
                data: {valor: request.term}, // recueperamos la info del campo autocomplete
                success: function(data){
                    response(data); //pasamos la respuesta al parametro
                    console.log(data)
                }
            });
        },
        minLength:2,
        select: function(event, ui){ //pasa los datos al seleccionar una info al button
            data = ui.item.id+"*"+ui.item.codigo+"*"+ui.item.label+"*"+ui.item.precio+"*"+ui.item.stock;
            $("#btn-agregar").val(data);
        },

   });



   // Boton para agregar el detalle de la venta
   $("#btn-agregar").on("click", function(){
        
        data = $(this).val();
        
        if(data != ''){

            //console.log("pasar"+data);
            infoProducto = data.split("*");
            //console.log(infoProducto);


            //verificando si el producto ya se registro  ------ (recorrer todo las tr de la tabla) <------ PENDIENTE 22/12/17
            codproducto = $("#tbventas input.cantidades").closest("tr").find("td:eq(0)").text();
            //ntr = $("#tbventas input.cantidades").length;
            console.log(codproducto+ " = "+ infoProducto[1]);


            //<------ PENDIENTE 22/12/17-------------------
            
            /*$('#tbventas tr').each(function () {
     
                codproductos = $(this).closest("tr").find("td:eq(0)").text();

                console.log(codproductos);

                if (infoProducto[1] == codproductos) {

                    alert("Error ya fue registrado");
                }
                 
            });*/




            // 1- verifico el stock minimo
            if(infoProducto[4] == 0){

                alert("Producto sin Stock, comuniquese con el Admin");

            // 2- verificando si el producto ya se registro      
            }else if(infoProducto[1] == codproducto){

                    alert("El producto ya ha sido registrado");

                }else{

                    html = "<tr>";
                    html += "<td><input type='hidden' name='idproductos[]' value='"+infoProducto[0]+"'>"+infoProducto[1]+"</td>";
                    html += "<td>"+infoProducto[2]+"</td>";
                    html += "<td><input type='hidden' name='precios[]' value='"+infoProducto[3]+"'>"+infoProducto[3]+"</td>";
                    html += "<td>"+infoProducto[4]+"</td>";
                    html += "<td><input type='text' name='cantidades[]' class='cantidades' value='1'></td>";
                    html += "<td><input type='hidden' name='importes[]' value='"+infoProducto[3]+"'><p>"+infoProducto[3]+"</p></td>";
                    html += "<td><button type='button' class='btn btn-danger btn-removeV'><span class='fa fa-remove'></span></button></td>";
                    html += "</tr>";


                    $("#tbventas tbody").append(html);
                    $("#btn-guardar").removeAttr("disabled");

                    //llamo la metodo sumar ventas y reseteo el botton e input
                    sumarVentas();
                    $("#btn-agregar").val(null);
                    $("#producto").val(null);

                }


        }else{

            alert("Debe seleccionar un Producto!");
        }

  
   });



   // elimina cada item de la venta
   $(document).on("click",".btn-removeV",function(){
        $(this).closest("tr").remove();
         sumarVentas();

         /*if($("#tbventas tbody").text("")){

            alert("la caja esta vacia");
         }*/
    
   });


   // se modifica las cantidades de los productos
   $(document).on("keyup", "#tbventas input.cantidades", function(){
        
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(2)").text();
        // genero el importe a pagar
        importe = cantidad * precio;

        //valido si la nueva cantidad es mayor al stock
         stock = $(this).closest("tr").find("td:eq(3)").text();

         if (cantidad > stock) {
            alert("La cantidad solicitada supera el limite del Stock permitido");
            $(this).val("");

         }else{

            //busco el td con el indice de la quinta columna, y selecciono el elemento input e imprimo (p parrafo oculto :)
            $(this).closest("tr").find("td:eq(5)").children("p").text(importe);
            $(this).closest("tr").find("td:eq(5)").children("input").val(importe);

            //metodo de calculo
            sumarVentas();
         }

        console.log("soy el stock"+stock);
        //console.log(cantidad);
        //console.log(precio);
        //console.log("new inporte"+importe);
        //alert("hola");
           
   });



   //Iformacion de las ventas (Modal y ajax)
   $(document).on("click",".btn-viewV",function(){

        ventaId = $(this).val();
        //console.log(ventaId);
        
        $.ajax({
            url : base_url + "movimiento/Cventas/viewVentas",
            type: "POST",
            datatype: "html",
            data: {id:ventaId},
            success : function(data){
                $("#modal-default .modal-body").html(data);
            } 
        });

   });

   //Imprimir Ventas
    $(document).on("click",".btn-printV",function(){

        $("#modal-default .modal-body").print({
            title : "Comprobante de Venta",

        });
        
   });

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


function sumarVentas(){

    sTotal = 0;
    // recorro toda las filas y sumo los subtotales
    $("#tbventas tbody tr").each(function(){
        sTotal = sTotal + Number($(this).find("td:eq(5)").text());

        //alert(sTotal);
    });

    //asigno el subtotal al campo
    $("input[name=subtotal]").val(sTotal.toFixed(2));
    

    //genero y asigno el porcentaaje del IGV
    porcentaje = $("#igv").val();
    igv = sTotal * (porcentaje/100);
    $("input[name=igv]").val(igv.toFixed(2));

    //calculo el precio neto a pagar
    dsct = $("input[name=descuento]").val();
    pNeto = sTotal + igv - dsct;
    $("input[name=total]").val(pNeto.toFixed(2));
}




