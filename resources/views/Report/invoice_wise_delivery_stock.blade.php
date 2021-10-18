@extends('layouts.app')

@section('content')

                        <!-- Authentication Links -->            
     @guest

     @else

<div class="card">
    <div class="card-title">
    	<h1 class="text-center">Sales Wise Report For Delivery/Warehouse</h1>     
    	<br>      
    </div>
 <div class="card-body">	
 <div class="row">
 	<div class="col-sm-12 text-center">
 		<strong>Report For Delivery</strong>
 		<input type="radio" name="delivery" value="delivery" class="search_value">
 		<strong>Report For Warehouse</strong>
 		<input type="radio" name="warehouse" value="warehouse" class="search_value">
 	</div>
 </div>	
 <div class="show_warehouse" style="display: none;">
  
 	<form method="GET" action="{{route('report-for-warehouse')}}" id="crediForm" target="_blank">

 <div class="form-row">
 	<div class="col-sm-8">
 	<label>Invoice Number</label> 
  <input type="text" name="invoice_number" class="form-control" placeholder="Please Enter Invoice Number">
 </div>
 	<div class="col-sm-4" style="padding-top:38px;">
 		<button type="submit" class="btn btn-outline-success btn"> <i class="fa fa-search"></i>Search</button>
 	</div>
  </div>

 </form>

 </div>

  <div class="show_delivery" style="display: none;">
 	<form method="GET" action="{{route('report-for-delivery')}}"  target="_blank">

 <div class="form-row">
  <div class="col-sm-8">
  <label>Invoice Number</label> 
  <input type="text" name="invoice_number" class="form-control" placeholder="Please Enter Invoice Number">
 </div>
  <div class="col-sm-4" style="padding-top:38px;">
    <button type="submit" class="btn btn-outline-success btn"><i class="fa fa-search"></i>Search</button>
    <!-- <a type="submit" class="btn btn-outline-success btn"> <i class="fa fa-search"></i>Search</a> -->
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
		if (search_value=='warehouse') {
			$('.show_warehouse').show();
		}
		else{
				$('.show_warehouse').hide();
			}
		
		if (search_value=='delivery') {
			$('.show_delivery').show();
		}
		else{
			$('.show_delivery').hide();
		}

	});
</script> 
 @endguest

@endsection