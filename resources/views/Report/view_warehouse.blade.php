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
	  	<div class="row">
	  		<div class="col-md-12">

	  			<h2 style="text-align:center;">JAFREE MACHINERY & TOOLS</h2>
	  			<table width="100%">
			   		<tbody>
			   			<tr >
			   				<td ></td>	
						</tr>

						
						
						<tr>
							<td width="45%">226, Nobabpur Road, Near Manoshi Complex </td>
							<td width="20%">Call- 01711-349098</td>
							<td width="35%">Web: www.jafreemachinery.com</td>
						</tr>
						<tr>
							<td></td>

						</tr>
					
			   		</tbody>
			   	</table>
			   	@foreach($data as $d)
			   	<h2  style="text-align: center;">Invoice Number # {{$d->invoice_number}}
			   	@endforeach

			  	
			  		</h2>


			   	<br> 	<br>

			   	<br>


			   	   	 	<table width="100%">
   		<tbody>
   			@foreach($data as $d)
   			<tr >
   				<td  class="text-left" width="10%"> Customer Info</td>
				<td class="text-left" width="30%" >Name: {{$d['customer']['name']}}</td>				
   				<td class="text-left"  width="30%" >Mobile Number: {{$d['customer']['phone']}}</td>
				<td class="text-left" width="28%">Address: {{$d['customer']['address']}} </td>
			</tr>
		@endforeach
			<br>
			<br>
			<br>
			<tr>
<td></td>
			
   		</tbody>	

   	</table>


	   		</div>
		</div>

		
<hr>

<br>
<br>
  		<div class="row">
  			<div class="col-md-12">

  				<table border="3" class="table-responsive" width="100%">
  					<thead >
			   <tr>
					<th class="text-center">Id</th>
					<th class="text-center">Category</th>
					<th class="text-center" >Product Name</th>
					<th class="text-center">Current Stock</th>
					<th class="text-center" >Quantity</th>
					<th class="text-center" >Unit Price</th>
					<th class="text-center" >Total Price</th>
				</tr>
	 		 </thead>
	 		 <tbody>

	 		 	@php
	 		 	$total_sum= '0';
	 		 	$details = App\Models\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
	 		 	@endphp

	 		 	@foreach($details as $key=> $d)
			    <tr class="text-center" >
			    	<input type="hidden" name="category_id[]" value="{{$d->category_id}}">
			    	<input type="hidden" name="product_id[]" value="{{$d->product_id}}">
			    	<input type="hidden" name="selling_quantity[{{$d->id}}]" value="{{$d->selling_quantity}}">
					<td >{{$key+1}}</td>
					<td >{{$d['category']['name']}}</td>
					<td >{{$d['product']['name']}}</td>
					<td >	{{$d['product']['quantity']}}</td>
					<td > {{$d->selling_quantity}}</td>
					<td >{{$d->unit_price}}</td>
					<td  class="text-center">{{$d->selling_price}}</td>
				@php
	 		 	$total_sum+=$d->selling_price;
	 		 	@endphp	
				</tr>
				
				@endforeach
				<tr>
					<td colspan="6" > <strong>Sub Total</strong></td>
					<td class="text-center" > {{$total_sum}}</td>
				</tr>
				<tr>
					<td colspan="6" > Discount</td>
					<td class="text-center" > {{$payment->discount_amount}}</td>
				</tr>
				<tr>
					<td colspan="6" > Paid Amount</td>
					<td class="text-center" > {{$payment->paid_amount}}</td>
				</tr>
	 		 <tr>
					<td colspan="6" > Due Amount</td>
					<input type="hidden" name="new_paid_amount" value=" {{$payment->due_amount}}">
					<td class="text-center" > {{$payment->due_amount}}</td>
				</tr>

				<tr>
					<td colspan="6" ><strong> Grand Total</strong></td>
					<td class="text-center" > {{$payment->total_amount}}</td>
				</tr>
					<tr>
					<td colspan="7" style="text-align: center;"><strong>Paid Summary</strong></td>
				</tr>
				<tr>
				<td colspan="3" style="text-align: right;"><strong>Date</strong></td>
				<td colspan="4" style="text-align: center;"><strong>Paid Amount</strong></td>
				</tr>
				
				@php
					$payment_details= App\Models\Models\PaymentDetail::where('invoice_id', $payment->invoice_id)->get();
				@endphp


					@foreach ($payment_details as $d)
					<tr>
						
							<td colspan="3" style="text-align: right;">{{date('d-m-Y', strtotime($d->date))}}</td>
							<td colspan="4" style="text-align: center;">{{$d->curent_paid_amount}}</td>
						
					</tr>
				@endforeach

	 		 </tbody>


  				</table>

  				</div>
  </div>


  					<br>
  		<br>
  		<div class="row">
  			<div class="col-md-12">
  				<hr style="margin-bottom: 0px;">
  				<table border="0" width="100%">
  					<tbody>
  						<tr>
  							<td style="width: 40%;">
  								<p style="text-align: center; margin-left: : 20px;"> Customer Signature
  							</td>

  							<td width="20%"></td>

  							<td style="width: 40%;">
  								<p style="text-align: center; margin-left: : 20px;"> Seller Signature
  							</td>

  						</tr>
  					</tbody>
  				</table>

			</div>
  		</div>

  			@php
  		$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
  	@endphp
  	<i>Printing Time : {{$date-> format('F j,Y, g:i a')}} 	</i>
  </div>

  

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>



