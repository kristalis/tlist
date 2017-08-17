

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <p>Hi,</p>

<p>Someone has invited you to access their account.</p>

<a href="{{ route('accept', $invite->token) }}">Click here</a> to activate!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
