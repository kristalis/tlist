@extends('layouts.app')

@section('content')

<div class="container">

  @include('includes.summary')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">FluidStudio Tasklists</div>
                <div class="panel-body">
                
                   <div class="panel-body">
                        <div class="post-title">
                          <h2>  {{ $tasklists->title }} </h2>
                         </div>
                          <h3 class="post-subtitle">
                            {{ $tasklists->description}} 
                          </h3>
                          @if($tasklists->completed != 0)
                          <a href="{{@url('lists').'/'}}" class="btn btn-primary">
                          {!! 'Tasklist Completed: Yes' !!}
                          @else
                          {!! 'Tasklist Completed: No' !!}
                          @endif
                          </a>
          </td>
                    </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>

@endsection



      