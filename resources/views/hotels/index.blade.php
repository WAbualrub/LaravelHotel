@extends('app')

@section('content')


 <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hotels List</div>
                <div class="panel-body">            

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>name</th>
      <th>City_id</th>
      <th>AvgRate</th>
      <th>Country_id</th>
     <th>Delete</th>

    </tr>
  </thead>
  <tbody>
     @if ( !$hotels->count() )
        You have no projects
    @else
         @foreach( $hotels as $hotel )

    <tr>
      <th scope="row"> {{$hotel->hotel_id}}</th>
      <td> {{$hotel->name}}</td>
      <td> {{$hotel->city_id}}</td>
      <td> {{$hotel->price}}</td>
      <td> {{$hotel->country_id}}</td>

    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('hotel.destroy', $hotel->id))) !!}

        <td>{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}</td>
    

    {!! Form::close() !!}
    </tr>
     @endforeach

    @endif

  </tbody>
</table> 
        <td>{!! link_to_route('hotel.create', 'Create New Hotel', null, array('class' => 'btn btn-info')) !!}</td>

</div></div></div></div></div></div> 
@endsection
@stop