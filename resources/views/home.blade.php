@extends('layouts.master')

@section('isi')
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Transkasi</span>
        <span class="info-box-number">{{Ayo::rupiah($transaksi_total)}}</span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-red"><i class="fa fa-umbrella"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Paket Wisata</span>
        <span class="info-box-number">{{$paket_wisata}}</span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix visible-sm-block"></div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Wisawatan</span>
        <span class="info-box-number">{{$wisawatan}}</span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Agenda</span>
        <span class="info-box-number">{{$agenda}}</span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
</div>
@endsection
