@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
          <h1 class="font-green">Gallery <small>World!</small></h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb breadcrumb-costum">
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="active">Gallery</li>
        </ol>
    </div>
</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Services</h3>
    </div>
      <div class="panel-body">

                <form action="{{ url('galleries') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">

                    <div class="form-group">
                      <input type="file" id="file" name="image" class="form-control"  />
                    </div>

                    <input type="submit" id="submit" value="Upload" class="btn btn-primary" />

                </form>
          </div>    
  </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Gallery
                </div>
                <div class="panel-body">
                       
                       <div class="row">
                      @foreach($galleries as $gallery)

                            <div class="col-md-4">
                                  <img class="img-responsive img-thumbnail" src="{{ asset('/upload/img/'.$gallery->image) }}" alt="">

                                 <form method="POST" action="{{ url('galleries/'.$gallery->id) }}" accept-charset="UTF-8">
                                 <input name="_method" type="hidden" value="DELETE">
                                 <input name="_token" type="hidden" value="{{ csrf_token() }}">

                                  <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete?')" ><i class="fa fa-trash-o"></i></button>

                                </form>

                            </div>

                      @endforeach
                      </div>
                </div>
            </div>

@endsection