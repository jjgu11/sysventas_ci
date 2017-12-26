	
<div class="row">
	<div class="col-xs-6 text-center">
		<b>Empresa de Ventas</b><br>
		Calle Moquegua 430 <br>
		Tel. 481890 <br>
		Email:yonybrondy17@gmail.com
	</div>
	<div class="col-xs-6 text-center">
		<img src="http://lorempixel.com/250/110/technics/3/LOGO/" alt="">
	</div>
</div> <br>
<hr>
<div class="row">
	<div class="col-xs-6">	
		<b>CLIENTE</b><br>
		<b>Nombre:</b><?php echo $ventas->nombres; ?><br>
		<b>Nro Documento:</b> <?php echo $ventas->dni; ?><br>
		<b>Telefono:</b> <?php echo $ventas->telefono; ?><br>
		<b>Direccion</b> <?php echo $ventas->direccion; ?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b><?php echo $ventas->tipocomprobante; ?><br>
		<b>Serie:</b> <?php echo $ventas->serie; ?><br>
		<b>Nro de Comprobante:</b> <?php echo $ventas->num_doc; ?><br>
		<b>Fecha</b> <?php echo $ventas->fecha; ?>
	</div>	
</div>
<hr>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detalles as $detalle): ?>
				<tr>
					<td><?php echo $detalle->codigo; ?></td>
					<td><?php echo $detalle->nombre; ?></td>
					<td><?php echo $detalle->precio; ?></td>
					<td><?php echo $detalle->cantidad; ?></td>
					<td><?php echo $detalle->importe; ?></td>
				</tr>
				<?php endforeach; ?>
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $ventas->subtotal; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IGV:</strong></td>
					<td><?php echo $ventas->igv; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $ventas->descuento; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $ventas->total; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>