@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->
   
                    
     @guest

     @else


<div class="card">
    <div class="card-title">
    	<h1 class="text-center">View Customers Paid Report</h1>           
    </div>
 <div class="card-body">		

   	<div class="text-right">
   		<a href="{{route('customer-paid-invoice-report')}}" class="btn btn-primary" target="_blank"> Download Customer Paid Report <i class="fa fa-download"></i> </a>
   	</div>

   	<br>
   	<br>

    <div class="table-sm  ">
	    <table class="table table-hover table-responsive table-dark table-striped align-middle">
	    	 <thead >
			   <tr class="text-center" style="color:white;">
					<th style="color:white;" >SL</th>
					<th style="color:white;">Customer Name</th>
					<th style="color:white;">Invoice Number</th>
					<th style="color:white;">Date</th>
					<th style="color:white;">Total Amount</th>
					<th style="color:white;">Paid Amount</th>
					<th style="color:white;">Due Amount</th>	
					<th style="color:white;" class="text-center" >Action</th>
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
					<td style="color:yellow;">{{$key+1}}</td>
					<td style="color:yellow;">{{$d['customer']['name']}}			
							({{$d['customer']['phone']}}-{{$d['customer']['address']}})</td>
					<td style="color:yellow;">Invoice No# {{$d['invoice']['invoice_number']}}</td>
					<td style="color:yellow;">{{date('d-m-Y', strtotime($d['invoice']['date']))}}</td>
					<td style="color:yellow;">{{$d->total_amount}}  Tk</td>
					<td style="color:yellow;">{{$d->paid_amount}}  Tk</td>
					<td style="color:yellow;">{{$d->due_amount}}  Tk</td>

					<td>
						<a href="{{URL::to('customers-paid-report/'. $d->invoice_id) }}" class="btn btn bg-success" target="_blank">Details <i class="fa fa-eye"></i> </a>
						<<!-- a href="" class="btn btn bg-success">View</a> -->
					</td>
				@php
	 		 	$total_sum+=$d->total_amount;
	 		 	$total_paid+=$d->paid_amount;
	 		 	$total_due+=$d->due_amount;
	 		 	@endphp

				</tr>
			@endforeach
				<tr>
					
					<td colspan="4" style="color:white;">Grand Total :

				</td>
				<td style="color:yellow; text-align: center;">{{$total_sum}}</td>
				<td style="color:yellow; text-align: center;">{{$total_paid}}</td>
				<td style="color:yellow; text-align: center;">{{$total_due}}</td>
			</tr>
				

					
	 		 </tbody>

	    </table>

    </div>
   </div>
</div>


 @endguest

@endsection