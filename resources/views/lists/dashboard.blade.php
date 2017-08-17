@extends('layouts.app')

@section('content')

 <div class="container">
 @include('includes.usersummary')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Completed</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($tasklists as $tasklist) 
        <tr>
          <th scope="row">{{++$i}}</th>
          <td width="200px">{{$tasklist->title}}</td>
          <td>{{$tasklist->description}}</td>
          <td>  @if($tasklist->completed != 0)
                  {!! 'Yes' !!}
                  @else
                  {!! 'No' !!}
                  @endif
          </td>
          <td >
          @if(!Auth::guest() && ($tasklist->owner_id == Auth::user()->id || Auth::user()->is_admin()))
          {{-- {{@url('lists').'/'.$tasklist->id}} --}}
            <p><a href="{{@url('lists').'/'.$tasklist->id.'/edit'}}" class="btn btn-primary">Update</a></p>
            <form action="{{@url('lists').'/'.$tasklist->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">Detete</button>
            </form>
          @endif
          </td>
        </tr>
        {{-- {{$i++}} --}}
        @endforeach
      </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

@endsection

