@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'Home', 'title' => __('Bitacora Resona')])

@section('content')
@guest
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="col-lg-7 col-md-8">
      <h1 class="text-white text-center">{{ __('Bienvenido al sistema de Bitácora de RESONA') }}</h1>
    </div>
  </div>
</div>
@endguest
@endsection