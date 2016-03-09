@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
					<td><br>{!! link_to_route('hotel.index', 'Hotels Page', null, array('class' => 'btn btn-info')) !!}</td>
					<td><br>{!! link_to_route('hotel.search', 'Hotels Search', null, array('class' => 'btn btn-info')) !!}</td>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
