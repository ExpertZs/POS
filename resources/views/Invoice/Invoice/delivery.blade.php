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
  					
	
   	@php
   	$payment= App\Models\Models\Payment::where('invoice_id',$invoice->id)->first();
   	@endphp


   	<h3 style="text-align:center;">Recipent Info</h3>
 
   	<table width="100%" border="2">
   		<thead>
   			 <tr>
					<th class="text-center">Recipient Name</th>
					<th class="text-center" >Address</th>
					<th class="text-center">Contact Number</th>
				</tr>
   		</thead>
   		<tbody>
   			<tr >
				<td class="text-left" width="30%" >Name: {{$payment['customer']['name']}}</td>	
						<td class="text-left" width="28%">Address: {{$payment['customer']['address']}} </td>	
   				<td class="text-left"  width="30%" >Mobile Number: {{$payment['customer']['phone']}}</td>
			</tr>

	
   		</tbody>	
   	</table>

   	<table>
   		<tbody>
   			<tr>
   				<td>Item Quantity</td>
   					
   				<td>{{	$invoice_d->selling_quantity}}</td>
   			
   			</tr>
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



