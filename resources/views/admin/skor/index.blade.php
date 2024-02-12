@extends('layouts.admin')

@section('title')
Skor Pertandingan
@endsection

@section('breadcums')
<small class="text-muted"><a href="#">Home</a> / <a href="{{ route('skor.index') }}">Skor Pertandingan</a></small>
@endsection

@section('content')
<div class="padding">
    <div class="box">
      <div class="box-header">
        <div class="text-left">
            <h2>Lists Skor Pertandingan</h2>
        </div>
        <div class="text-right">
            <a href="{{ route('skor.create_multiple') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus m-r-xs"></i> Create Multiple</a>
            <a href="{{ route('skor.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus m-r-xs"></i> Create</a>
        </div>
      </div>
      <div class="box-body">
        Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r"/>
      </div>
      <div>
        <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
          <thead>
            <tr>
                <th data-toggle="true">
                    Klub 1
                </th>
                <th>
                    Skor
                </th>
                <th>
                    Klub 2
                </th>
                <th>
                    Skor
                </th>
                <th>
                    Dibuat Pada
                </th>
                <th>
                    Action
                </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->klub1 }}</td>
                    <td>{{ $item->skor_klub_1 }}</td>
                    <td>{{ $item->klub2 }}</td>
                    <td>{{ $item->skor_klub_2 }}</td>
                    
                    <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('skor.edit', [$item->id]) }}" class="btn btn-primary m-t-5 m-r-5">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" onclick="confirmDelete(event, {{ $item->id }})" class="btn btn-danger m-t-5 m-r-5">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          </tbody>
          <tfoot class="hide-if-no-paging">
            <tr>
                <td colspan="5" class="text-center">
                    <ul class="pagination"></ul>
                </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
    function confirmDelete(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var postForm = {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'DELETE',
                };
                $.ajax({
                    url: 'skor/'+id,
                    type: 'POST', 
                    data : postForm,
                    dataType  : 'json',
                })
                .done(function(data) {
                    Swal.fire('Deleted!', data['message'], 'success');
                    location.reload();
                })
                .fail(function() {
                    Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');
                });
            }
        });
    }
</script>
@endpush