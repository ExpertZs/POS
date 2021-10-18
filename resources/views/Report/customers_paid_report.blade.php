<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS public/bootstrap-5.1.3-dist/css/bootstrap.min.css-->
    <link href="{{asset('public/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Customers Paid Report</title>
  </head>
  <body>
  	<div class="container-sm">
  		<h1 style="text-align: center;" >JAFREE MACHINERY & TOOLS</h1>
  		<hr style="width: 70%;">
  		<div class="row">
			<p>226, Nobabpur Road, Near Manoshi Complex</p>
			<p>		Web: www.jafreemachinery.com </p>
			<p>Call- 01711-349098</p>
  		</div>
  	
 <div class="row">
  	<div class="col-md-12">
  					
	
 
 
<hr style="margin-bottom: 0px;">
  			</div>

  		</div>

  		<h1 style="text-align: center;">Customers Paid Report</h1>
  		<hr style="width: 50%;">
  		<br>

  		<div class="row">
  			<div class="col-md-12">
	   
	  <div class="table-sm  ">
	    <table border="3" class="table-responsive" width="100%">
	    	 <thead >
			   <tr class="text-center">
					<th >SL</th>
					<th>Customer Name</th>
					<th>Invoice Number</th>
					<th>Date</th>
					<th>Total Amount</th>
					<th>Paid Amount</th>
					<th>Due Amount</th>	
					
				</tr>
	 		 </thead>

	 		 <tbody>
 				@php
 				$total_sum='0';
 				$total_paid='0';
	 		 	$total_due='0';
	 		 	@endphp


	 		 	@foreach($data as $key=> $d)
			    <tr class="text-center">
					<td >{{$key+1}}</td>
					<td >{{$d['customer']['name']}}			
							({{$d['customer']['phone']}}-{{$d['customer']['address']}})</td>
					<td >Invoice No# {{$d['invoice']['invoice_number']}}</td>
					<td >{{date('d-m-Y', strtotime($d['invoice']['date']))}}</td>
					<td >{{$d->total_amount}}  Tk</td>
					<td >{{$d->paid_amount}}  Tk</td>
					<td >{{$d->due_amount}}  Tk</td>

				
				@php
	 		 	$total_sum+=$d->total_amount;
	 		 	$total_paid+=$d->paid_amount;
	 		 	$total_due+=$d->due_amount;
	 		 	@endphp

				</tr>
			@endforeach
				<tr>
					
					<td colspan="4">Grand Total :

				</td>
				<td text-align: center;>{{$total_sum}}</td>
				<td text-align: center;>{{$total_paid}}</td>
				<td text-align: center;>{{$total_due}}</td>
			</tr>
				

					
	 		 </tbody>

	    </table>

    </div>
	  
  			</div>
  		</div>

<br>
  		<br>
  		<br>
  		<br>

  		<hr style=" width: 25%; margin-right: 0px;">
  		<p style="text-align: right;"> Seller Signature</p>
  		
  	</div>

  		@php
  		$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
  	@endphp
  	<i>Printing Time : {{$date-> format('F j,Y, g:i a')}} 	</i>

   

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>