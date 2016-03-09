@extends('app')

<?php use App\hotel; ?>

@section('content')


 <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">resoult</div>
                <div class="panel-body">            
                    <table class="table">
                       <thead>
                         <tr>
      
                           <th>name</th>

                         </tr>
                       </thead>
                              <tbody>

                                 @foreach($hotels_info as $result)
                                      <tr>
      
                                          <td> {{ $result->name }} </td>
   
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
@endsection
@stop