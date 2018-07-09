@extends('layouts.app')

@section('title')
    Dasboard
@endsection

@section('breadcrumb')
    @parent
    <li>Dasboard</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <h1>Selamat Datang</h1>
            <h2>Anda Login Sebagai Kasir</h2>
          </div>
        </div>
      </div>
    </div>
@endsection