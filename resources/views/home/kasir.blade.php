@extends('layouts.app')

@section('title')
    Beranda
@endsection

@section('breadcrumb')
    @parent
    <li>Dashboard</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body text-center">
              <h4>Selamat Datang <h5>{{Auth::user()->name}}</h5> </h4> 
              <br><br>
              <a href="{{ route('transaksi.new') }}" class="btn btn-success btn-lg">Transaksi Baru</a>
              <br><br><br>
          </div>
        </div>
      </div>
    </div>
@endsection