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
            <h4>Selamat Datang <h5>Admin</h5> </h4>   
          </div>
        </div>
      </div>
    </div>
@endsection