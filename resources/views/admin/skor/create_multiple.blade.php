@extends('layouts.admin')

@section('title')
Create Skor Pertandingan Multiple
@endsection

@section('breadcums')
<small><a href="#">Home</a> / <a href="{{ route('skor.index') }}">Skor Pertandingan Multiple</a> / <a href="{{ route('skor.create') }}">Create</a></small>
@endsection

@section('content')

<div class="padding">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h2>Create Skor Pertandingan</h2>
            <small>buat beberapa Skor Pertandingan anda sekaligus di sini</small>
          </div>
          <div class="box-divider m-0"></div>
          <div class="box-body">
            <form role="form" action="{{ route('skor.store_multiple') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row" id="form_input">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="klub_id_1">Klub 1</label>
                      <select name="klub_id_1[]" id="klub_id_1" class="form-control" required>
                        <option value="" selected disabled>Pilih Klub</option>
                        @foreach ($klubs as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="klub_id_2">Klub 2</label>
                      <select name="klub_id_2[]" id="klub_id_2" class="form-control" required>
                        <option value="" selected disabled>Pilih Klub</option>
                        @foreach ($klubs as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="skor_klub_1">Skor Klub 1</label>
                      <input type="text" class="form-control" id="skor_klub_1" name="skor_klub_1[]" placeholder="Enter Skor" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="skor_klub_2">Skor Klub 2</label>
                      <input type="text" class="form-control" id="skor_klub_2" name="skor_klub_2[]" placeholder="Enter Skor" required>
                    </div>
                  </div>
                </div>

                <div class="row" id="append_form"></div>

              <button type="submit" class="btn white m-b">Submit</button>
              <button type="button" onclick="addData()" class="btn info m-b">Tambah Data</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection

@push('js')
    <script>
      function addData() {
        $('#append_form').append($('#form_input').html())
      }
    </script>
@endpush