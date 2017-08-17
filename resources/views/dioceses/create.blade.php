
@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Diocese</div>
                <div class="panel-body">
        
        <hr><br/>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('dioceses.store')}}" method="post">
            {{ csrf_field() }}

        <div class="form-group">
        <label for="title">Diocese Name</label>
        <input type="text" class="form-control" id="diocesename" name="diocesename" placeholder="Diocese Name">
        </div>
                       
        <div class="form-group">
            <label for="dioceseCentre">Diocese</label>
           <input type="text" class="form-control" id="diocesecentre" name="diocesecentre" placeholder="Diocese Centre">
        </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection    