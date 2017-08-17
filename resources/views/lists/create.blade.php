
@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Task for {{ Auth::user()->name }}</div>
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

        <form action="{{route('lists.store')}}" method="post">
            {{ csrf_field() }}

        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
                       
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="completed">Completed</label>
                            <input id="completed" name="completed" type="checkbox" value="1"></checkbox>
                        </div>

            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection    