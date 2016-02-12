@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
          <h1 class="font-green">Hello <small>World!</small></h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb breadcrumb-costum">
          <li class="active">Home</li>
        </ol>
    </div>
</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Dashboard</h3>
    </div>
        <div class="panel-body">
                You are logged in!
        </div>
    </div>
@endsection
