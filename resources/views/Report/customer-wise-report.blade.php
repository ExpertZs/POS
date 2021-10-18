@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->            
     @guest

     @else

<div class="card">
    <div class="card-title">
    	<h1 class="text-center">Customer Wise Credit/Paid Report</h1>     
    	<br>      
    </div>
 <div class="card-body">	
 <div class="row">
 	<div class="col-sm-12 text-center">
 		<strong>Customer Wise Credit Report</strong>
 		<input type="radio" name="Customer_wise_Credit_Paid" value="credit" class="search_value">
 		<strong>Customer Wise Paid Report</strong>
 		<input type="radio" name="Customer_wise_Credit_Paid" value="paid" class="search_value">
 	</div>
 </div>	
 <div class="show_credit" style="display: none;">
 	<form method="GET" action="{{route('customer-wise-credit')}}" id="crediForm" target="_blank">

 <div class="form-row">
 	<div class="col-sm-8">
 	<label>Customer Name for Credit</label> 
 	<select name="customer_id" class="form-control select2">
 		<option value="">Select Customer</option>
 		@foreach($customers as $customer)
 		<option value="{{$customer->id}}">{{$customer->name}} ({{$customer->phone}}-{{$customer->address}})</option>
 		@endforeach
 	</select>
 </div>
 	<div class="col-sm-4" style="padding-top: 29px;">
 		<button type="submit" class="btn btn-primary btn-sm">Search</button>
 	</div>
 </div>

 </form>

 </div>

  <div class="show_paid" style="display: none;">
 	<form method="GET" action="{{route('customer-wise-paid')}}" id="paidForm" target="_blank">

 <div class="form-row">
 	<div class="col-sm-8">
 	<label>Customer Name for Paid</label> 
 	<select name="customer_id" class="form-control select2">
 		<option value="">Select Customer</option>
 		@foreach($customers as $customer)
 		<option value="{{$customer->id}}">{{$customer->name}} ({{$customer->phone}}-{{$customer->address}})</option>
 		@endforeach
 	</select>
 </div>
 	<div class="col-sm-4" style="padding-top: 29px;">
 		<button type="submit" class="btn btn-primary btn-sm">Search</button>
 	</div>
 </div>

 </form>

 </div>

   </div>
</div>
<!-- </div>
 -->

 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#supplierWiseForm').validate({
 		ignore:[],
 		errorPlacement: function(error, element){
 			if (element.attr("name")=="suplier_id"){
 				error.insertAfter(element.next());
 			}
 			else{
 				error.insertAfter(element);
 			}
 		},
 		errorClass:'text-danger',
 		validClass:'text-success',
 		rules:{
 			suplier_id:{
 				required:true,
 			}
 		},
 		message:{

 			}, 
 		});

 	});
 </script>

 <script type="text/javascript">

	$(document).on('change','.search_value', function(){
		var search_value = $(this).val();
		if (search_value=='credit') {
			$('.show_credit').show();
		}
		else{
				$('.show_credit').hide();
			}
		
		if (search_value=='paid') {
			$('.show_paid').show();
		}
		else{
			$('.show_paid').hide();
		}

	});
</script> 
 @endguest

@endsection