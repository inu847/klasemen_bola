@extends('layouts.admin')

@section('title')
Create Skor Pertandingan
@endsection

@section('breadcums')
<small><a href="#">Home</a> / <a href="{{ route('skor.index') }}">Skor Pertandingan</a> / <a href="{{ route('skor.create') }}">Create</a></small>
@endsection

@section('content')

<div class="padding">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h2>Create Skor Pertandingan</h2>
            <small>buat Skor Pertandingan anda di sini</small>
          </div>
          <div class="box-divider m-0"></div>
          <div class="box-body">
            <form role="form" action="{{ route('skor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="klub_id_1">Klub 1</label>
                      <select name="klub_id_1" id="klub_id_1" class="form-control" required>
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
                      <select name="klub_id_2" id="klub_id_2" class="form-control" required>
                        <option value="" selected disabled>Pilih Klub</option>
                        {{-- @foreach ($klubs as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach --}}
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="skor_klub_1">Skor Klub 1</label>
                      <input type="text" class="form-control" id="skor_klub_1" name="skor_klub_1" placeholder="Enter Skor" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="skor_klub_2">Skor Klub 2</label>
                      <input type="text" class="form-control" id="skor_klub_2" name="skor_klub_2" placeholder="Enter Skor" required>
                    </div>
                  </div>
                </div>
              <button type="submit" class="btn white m-b">Submit</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection

@push('js')
    <script>
      $(document).on('change', '#klub_id_1', function () {
        var postForm = {
          '_token': '{{ csrf_token() }}',
          'id_exist'     : this.value
        };
        $.ajax({
          url: '{{ route("klub.check") }}', 
          type: 'POST', 
          data : postForm,
          dataType  : 'json',
        })
        .done(function(data) {
          // SET EMPTY SELECT
          $("#klub_id_2").empty();
          var select = document.getElementById("klub_id_2");

          // Populate select with options
          data.forEach(function(team) {
            var option = document.createElement("option");
            option.value = team.id;
            option.text = team.nama;
            select.appendChild(option);
          });

        })
        .fail(function() {
          alert('Load data failed.');
        });
      })
    </script>
@endpush