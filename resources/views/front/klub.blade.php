@extends('layouts.front')

@section('title')
Selamat Datang
@endsection

@section('content')
<div class="p-y-lg" id="demos">
  <div class="container p-y-lg text-primary-hover">
    <h2 class=" _700 l-s-n-1x m-b-md">Klub <span class="text-primary">{{ $klub->nama }}</span></h2>
    <h5 class="text-muted m-b-lg">Tentang Klub</h5>

    <div class="mb-5">
      <p>{!! $klub->description !!}</p>
    </div>

    <hr>
    <div class="mb-5">
      <h2 class=" _700 l-s-n-1x m-b-md">Detail <span class="text-primary"> Pertandingan</span></h2>
      <table class="table m-b-none">
        <tr>
          <th width="100">Main</th>
          <td width="10">:</td>
          <td>{{ $klub->ma }}</td>
        </tr>
        <tr>
          <th width="100">Menang</th>
          <td width="10">:</td>
          <td>{{ $klub->me }}</td>
        </tr>
        <tr>
          <th width="100">Seri</th>
          <td width="10">:</td>
          <td>{{ $klub->s }}</td>
        </tr>
        <tr>
          <th width="100">Kalah</th>
          <td width="10">:</td>
          <td>{{ $klub->k }}</td>
        </tr>
        <tr>
          <th width="100">GM</th>
          <td width="10">:</td>
          <td>{{ $klub->gm }}</td>
        </tr>
        <tr>
          <th width="100">GK</th>
          <td width="10">:</td>
          <td>{{ $klub->gk }}</td>
        </tr>
        <tr>
          <th width="100">POINT</th>
          <td width="10">:</td>
          <td>{{ $klub->point }}</td>
        </tr>
      </table>
    </div>

    <h2 class=" _700 l-s-n-1x m-b-md">Riwayat <span class="text-primary">Pertandingan</span></h2>
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
        </tr>
      </thead>
      <tbody>
        @foreach ($pertandingan as $item)
        <tr>
          <td>{{ $item->klub1 }}</td>
          <td>{{ $item->skor_klub_1 }}</td>
          <td>{{ $item->klub2 }}</td>
          <td>{{ $item->skor_klub_2 }}</td>
          <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
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
<div class="h-v white row-col">
  <div class="row-cell v-b">
    <div class="container p-y-lg pos-rlt">
      <h1 class="display-3 _700 l-s-n-3x m-t-lg m-b-md">Selamat Datang <span class="text-primary">di</span> Klasemen Bola</h1>
      <h5 class="text-muted m-b-lg">Klasemen Bola <span class="label accent">Digital</span> Klasemen Bola application</h5>
      <a href="{{ route('landingpage.index') }}" class="btn btn-lg btn-outline b-primary text-primary b-2x">Lihat Klasemen Bola</a>
    </div>
  </div>
</div>
@endsection