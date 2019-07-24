@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Routes</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li class="active"><a href="#"><span>Routes</span></a></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Route Name</h6>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="panel-wrapper collapse in">
						<div class="panel-body">

								@if (count($errors) > 0)
								<div style="padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem;
								  color:#721c24;background-color:#f8d7da;border-color:#f5c6cb;">
								<strong>Whoops!</strong> There were some problems with your input.<br>
								  <ul>
									@foreach ($errors->all() as $error)
									  <li>{{ $error }}</li>
									@endforeach
								  </ul>
								</div>
							  @endif

								@if (session('status'))
								<div class="alert alert-success">
								  {{ session('status') }}
								</div>
							  @endif


							<div class="form-wrap">

								<form role="form" action="{{action('RoutesController@addroute')}}" method="POST"
									enctype="multipart/form-data">

									@csrf

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<div class="input-group mb-15">
													<input type="text" id="example-input2-group2"
														name="route" class="form-control"
														placeholder="Route">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-success"><i
																class="btn-text">submit</span></button>
													</span>
												</div>
											</div>
										</form>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>


		<br>


		<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Route List</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						
						

						<div class="panel-wrapper collapse in">
							<div class="panel-body">
							


								<table class="table" id="table">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th class="text-center">Name</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody  style="text-align: center">
										@foreach($data as $item)	
										<tr>
											<td>{{$item->id}}</td>
											<td>{{$item->route}}</td>
											<td><button style="padding: 6px 12px" class="btn btn-warning">Update</button>
												<button style="padding: 6px 12px" class="btn btn-danger" id="deletebtn">Delete</button>
												</td>
										</tr>
										@endforeach
									</tbody>
								</table>



	
							</div>
						</div>
					</div>
				</div>
	
			</div>
	



	</div>
	<!-- /Row -->
</div>
</div>

<script>
	$('#deletebtn').click(function(){

		swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel",
        closeOnConfirm: false,
        closeOnCancel: false 
    },
    function(isConfirm) {
        if (isConfirm) {
		
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        } else {
            swal("Cancelled", "Your imaginary file is safe 🙂", "error");
        }
    }
);
		

	});
	</script>


<script>
	$(document).ready(function() {
	  $('#table').DataTable();
  } );
   </script>

@endsection