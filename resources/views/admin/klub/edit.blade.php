@extends('layouts.admin')

@section('title')
Edit Klub
@endsection

@section('breadcums')
<small class="text-muted"><a href="#">Home</a> / <a href="{{ route('klub.index') }}">Klub</a> / <a href="{{ route('klub.edit', [$data->id]) }}">Edit</a> <a href="#" class="hidden"></a></small>
@endsection

@section('content')

<div class="padding">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h2>Edit Klub</h2>
          </div>
          <div class="box-divider m-0"></div>
          <div class="box-body">
            <form role="form" action="{{ route('klub.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" value="{{ $data->nama }}" name="nama" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" value="{{ $data->kota }}" name="kota" placeholder="Enter Kota">
              </div>
              <div class="box m-b-md form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" ui-jp="summernote">{{ $data->description }}</textarea>
              </div>
              <div class="form-group">
                <label class="col-sm-2 form-control-label">Publish</label>
                <div class="col-sm-10">
                  <label class="ui-switch ui-switch-md info m-t-xs">
                    <input type="checkbox" name="status" {{ ($data->status == 1) ? 'checked' : '' }} class="has-value">
                    <i></i>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn white m-b">Submit</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection