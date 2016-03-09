@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Add New Hotel</div>
				<div class="panel-body">
					<form class="form-horizontal"  method="POST" action="{{ url('hotel') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Hotel Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Name" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">AvgRate</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="AvgRate">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Country</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Country" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="City">
							</div>
						</div>

						

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">add</button>

							</div>
						</div>
					</form>
				
@endsection
@stop
</div></div></div></div></div></div>  