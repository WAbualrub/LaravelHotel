
@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">search</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="Get" action="{{ url('queries\search_h') }}">
                        

                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">search</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="search">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">search</button>

                            
                            </div>
                        </div>


                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
