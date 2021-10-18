<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS public/bootstrap-5.1.3-dist/css/bootstrap.min.css-->
    <link href="{{asset('public/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Customers Credit Report</title>
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

  		<h1 style="text-align: center;">Customer Wise Credit Report</h1>
  		<hr style="width: 50%;">
  		<br>

  		<div class="row">
  			<div class="col-md-12">
	   
	    <table border="3" class="table-responsive" width="100%">
	    	<thead >
			   <tr>
					<th  >SL. No.</th>
					<th >Customer Name</th>
					<th >Invoice Number</th>
					<th>Date</th>
					<th >Description</th>
					<th >Due Amount</th>
				</tr>
	 		 </thead>
	 		 <tbody>


	 		 	@php
	 		 	$total_sum='0';
	 		 	@endphp

	 		 	@foreach($data as $key=> $d)
			    <tr>
					<td>{{$key+1}}</td>
					<td>{{$d['customer']['name']}}			
							({{$d['customer']['phone']}}-{{$d['customer']['address']}})</td>
					<td >Invoice No#{{$d['invoice'] ['invoice_number']}}</td>
					<td >{{date('d-m-Y', strtotime($d['invoice'] ['date']))}}</td>
					<td >{{$d->description}}</td>
					<td class="text-center" >	{{$d->due_amount}} Tk </td>
					@php
	 		 	$total_sum+=$d->due_amount;
	 		 	@endphp
					
				</tr>
				@endforeach
				
				<tr><td colspan="5" style="text-right">Grand Total

				</td>
				<td>{{$total_sum}}</td>

			</tr>
	 		 </tbody>

	    	

	    </table>
	  
  			</div>
  		</div>


  		<br>
  		<br>

  		<hr style=" width: 25%; margin-right: 0px;">
  		<p style="text-align: right;"> Seller Signature</p>
  		
  	</div>

   

     <script src="{{asset('public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>