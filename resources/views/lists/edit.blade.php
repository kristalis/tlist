
@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task</div>
                <div class="panel-body">
      
        <hr><br/>

       

        <form action="{{route('lists.store').'/'.$tasklists->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$tasklists->title}}">
            </div>
             
                       
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{$tasklists->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="completed">Completed</label>
               @if($tasklists->completed != 0)
               <input id="completed" name="completed" type="checkbox" checked="{{$tasklists->completed}}"></input>
               @else
                <input id="completed" name="completed" type="checkbox" value="{{$tasklists->completed}}"></input>
               @endif

               
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{@url('/user/'.Auth::id().'/tasklists')}}" class="btn btn-danger">Cancel</a>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection  