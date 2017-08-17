@extends('layouts.app')

@section('content')

<div class="container">
@component('includes.summary') @endcomponent 
  
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Catch the Anointing Pastors' Visit Feedback Portal</div>
                <div class="panel-body">
                @foreach ($tasklists as $tasklist) 
                    <div class="panel-body">
                        <div class="post-title">
                          <h2>  {{ $tasklist->title}} </h2>
                         </div>
                          <h3 class="post-subtitle">
                        {!! str_limit($tasklist->description, $limit = 50, $end = '....... ') !!}

                          </h3>
                          <a href="{{@url('lists').'/'.$tasklist->id}}" class="btn btn-primary">View Task by {{ $tasklist->owner->name}} </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
