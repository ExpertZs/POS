<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS public/bootstrap-5.1.3-dist/css/bootstrap.min.css-->
    <link href="{{asset('public/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Report for Warehouse</title>
  </head>
  <body>
  	<div class="container-sm">
<h2 style="text-align:center;">JAFREE MACHINERY & TOOLS</h2>
<br>
<hr style="margin-bottom width: 70%;">
<h3>226, Nobabpur Road, Near Manoshi Complex </h3>
<h3>Call- 01711-349098</h3>
<h3>Web: www.jafreemachinery.com</h3>
<br>
<hr style="margin-bottom width: 90%;">
<br>

		<div class="col-md-12">
    	<h2>Invoice No # {{$invoice->invoice_number}}({{date('d-m-Y', strtotime($invoice->date))}})</h2>
    </div>


 

  		 		<div class="row">
  			<div class="col-md-12">
	   
	    <table border="3" width="100%">
	    	 <thead >
			   <tr>
					<th >Id</th>
					<th class="text-center">Category</th>
					<th class="text-center" >Product Name</th>
					<th class="text-center">Current Stock</th>
					<th class="text-center" >Quantity</th>
				</tr>
	 		 </thead>
	 		 <tbody>
	 		 	@php
	 		 	$total_sum='0';
	 		 	@endphp

	 		 	@foreach($invoice['invoice_details'] as $key=> $d)
			    <tr class="text-center" >
			    	<input type="hidden" name="category_id[]" value="{{$d->category_id}}">
			    	<input type="hidden" name="product_id[]" value="{{$d->product_id}}">
			    	<input type="hidden" name="selling_quantity[{{$d->id}}]" value="{{$d->selling_quantity}}">
					<td>{{$key+1}}</td>
					<td>{{$d['category']['name']}}</td>
					<td>{{$d['product']['name']}}</td>
					<td>	{{$d['product']['quantity']}}</td>
					<td>{{$d->selling_quantity}}</td>
				</tr>
			
				@endforeach
				
	 		 </tbody>

	    </table>
	  
  			</div>
  		</div>
  	
</div>

  	@php
  		$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
  	@endphp
  	<i>Printing Time : {{$date-> format('F j,Y, g:i a')}} 	</i>

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>



