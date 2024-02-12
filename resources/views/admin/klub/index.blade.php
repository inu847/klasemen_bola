@extends('layouts.admin')

@section('title')
Klub
@endsection

@section('breadcums')
<small class="text-muted"><a href="#">Home</a> / <a href="{{ route('klub.index') }}">Klub</a></small>
@endsection

@section('content')
<div class="padding">
    <div class="box">
      <div class="box-header">
        <div class="text-left">
            <h2>Lists Klub</h2>
        </div>
        <div class="text-right">
            <a href="{{ route('klub.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus m-r-xs"></i> Create</a>
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
                    Nama
                </th>
                <th>
                    Kota
                </th>
                <th>
                    Deskripsi
                </th>
                <th>
                    Status
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
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kota }}</td>
                    <td>{!! $item->description !!}</td>
                    @if ($item->status == 1)
                        <td data-value="1"><span class="label success" title="Active">Publish</span></td>
                    @else
                        <td data-value="1"><span class="label danger" title="Active">Archive</span></td>
                    @endif
                    <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('landingpage.show', [$item->id]) }}" target="__blank" class="btn btn-success m-t-5 m-r-5">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('klub.edit', [$item->id]) }}" class="btn btn-primary m-t-5 m-r-5">
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
                    url: 'klub/'+id,
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