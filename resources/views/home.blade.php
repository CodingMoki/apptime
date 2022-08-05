@extends('layouts.stisla.index', ['title' => 'Admin Dashboard', 'page_heading' => 'Dashboard'])

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-columns"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>P5M</h4>
        </div>
        <div class="card-body">
          {{ $commodity_count }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-fw fa-check-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>INSPEKSI</h4>
        </div>
        <div class="card-body">
          {{ $commodity_condition_good_count }} 
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-fw fa-exclamation-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>GREEN CARD</h4>
        </div>
        <div class="card-body">
          {{ $commodity_condition_not_good_count }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-fw fa-times-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>OBSERVASI</h4>
        </div>
        <div class="card-body">
          {{ $commodity_condition_heavily_damage_count }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="row">
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>LIST P5M TERBARU</h4>
      </div>
      <div class="card-body">
        @foreach($commodity_order_by_price as $key => $order_by_price)
        <ul class="list-unstyled list-unstyled-border">
          <li class="media"> -->
            <!-- <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar"> -->
            <!-- <div class="media-body">
              <button data-id="{{ $order_by_price->id }}" class="float-right btn btn-info btn-sm show_modal" data-toggle="modal" data-target="#show_commodity">Detail</button>
              <div class="media-title">{{ $order_by_price->name }}</div>
              <span class="text-small text-muted">Harga: Rp{{ $order_by_price->indonesian_currency($order_by_price->price) }}</span>
            </div>
          </li>
        </ul>
        @endforeach
        <div class="text-center pt-1 pb-1">
          <a href="{{ route('barang.index') }}" class="btn btn-primary btn-lg btn-round">
            Lihat Semua Barang
          </a>
        </div> -->
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('show')
@endpush

@push('js')
@include('_script');
@endpush