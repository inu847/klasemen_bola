@extends('layouts.front')

@section('title')
    Selamat Datang 
@endsection

@section('content')
<div class="h-v white row-col">
  <div class="row-cell v-b">
    <div class="container p-y-lg pos-rlt">
      <h1 class="display-3 _700 l-s-n-3x m-t-lg m-b-md">Selamat Datang <span class="text-primary">di</span> Klasemen Bola</h1>
      <h5 class="text-muted m-b-lg">Klasemen Bola <span class="label accent">Digital</span> Klasemen Bola application</h5>
      <a href="#klasemen" ui-scroll-to="klasemen" class="btn btn-lg btn-outline b-primary text-primary b-2x">Lihat Klasemen Bola</a>
    </div>
  </div>
</div>
<div class="p-y-lg" id="demos">
  <div class="container p-y-lg text-primary-hover">
    <h2 class=" _700 l-s-n-1x m-b-md">Klub</h2>
    <div class="row m-y-lg">
      @foreach ($klubs as $item)
        <div class="col-md-6 col-lg-4">
          <div class="box white box-shadow-z3 text-center">
              <a href="{{ route('landingpage.show', [$item->id]) }}">
                <span class="_800 p-a block h4 m-a-0">Klub {{ $item->nama }}</span>
                <span class="_600 p-a block h4 m-a-0">Kota {{ $item->kota }}</span>
              </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<div class="p-y-lg" id="klasemen">
  <div class="container p-y-lg text-primary-hover">
    <h2 class=" _700 l-s-n-1x m-b-md">Klasemen <span class="text-primary">Terbaru</span></h2>
    <h5 class="text-muted m-b-lg">Pelajari Sekarang</h5>
    <div class="row m-y-lg">
    <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
      <thead>
        <tr>
          <th data-toggle="true">Nama</th>
          <th>Ma</th>
          <th>Me</th>
          <th>S</th>
          <th>K</th>
          <th>GM</th>
          <th>GK</th>
          <th>Point</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($klubs as $item)
        <tr>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->ma }}</td>
          <td>{{ $item->me }}</td>
          <td>{{ $item->s }}</td>
          <td>{{ $item->k }}</td>
          <td>{{ $item->gm }}</td>
          <td>{{ $item->gk }}</td>
          <td>{{ $item->point }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
@endsection