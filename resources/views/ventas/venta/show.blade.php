@extends ('layouts.admin')
@section ('contenido')
	

        <div class="row">
        	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        		<div class="form-group">
		            	<label for="nombre">Cliente</label>
		            	<p>{{$venta->nombre}}</p>
            	</div>
        	</div>

        	
        	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	        	<div class="form-group">
	        		<label>Comprobante</label>
	        		<p>{{$venta->tipo_comprobante}}</p>
	        	</div>
        	</div>
        	
        	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	        	<div class="form-group">
			            	<label for="serie_comprobante">Serie del comprobante</label>
			            	<p>{{$venta->serie_comprobante}}</p>
	            	</div>
	        	</div>

	        	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	        	<div class="form-group">
			            	<label for="num_comprobante">Numero del comprobante</label>
			            	<p>{{$venta->num_comprobante}}</p>
	            	</div>
	        	</div>
</div>
 <div class="row">
 <div class="panel panel-primary">	
 	<div class="panel-body">
 		
	     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	     	<table class=" table table-striped table-bordered table-condensed table-hover" id="detalles">
	     		<thead style="background-color:#7F7AD2">	
	     		<th></th>
	     			<th>Articulos</th>
	     			<th>Cantidad</th>
	     			<th>Precio de venta</th>
	     			<th>Descuento</th>
	     			<th>Subtotal</th>
	     		</thead>
	     		<tfoot>
	     		<th></th>
	     			<th></th>
	     			<th></th>
	     			<th></th>
	     			<th>Total</th>
	     			<th><h4 id="total">{{$venta->total_venta}}</h4></th>
	     		</tfoot>
	     		<tbody>
	     			@foreach($detalles as $det)
	     				<th>
	     					<td>{{$det->articulo}}</td>
	     					<td>{{$det->cantidad}}</td>	     					
	     					<td>{{$det->precio_venta}}</td>
	     					<td>{{$det->descuento}}</td>
	     					<td>{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
	     				</th>
	     			@endforeach
	     		</tbody>

	     	</table>
	     </div>

 	</div>
 </div>
</div>
            
@endsection