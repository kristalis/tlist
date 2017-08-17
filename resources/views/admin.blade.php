@extends('layouts.app')

@section('content')
<div class="container">
@component('includes.adminsummary')
                    @endcomponent 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @component('includes.who')
                    @endcomponent     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection