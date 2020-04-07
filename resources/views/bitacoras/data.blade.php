@extends('layouts.app', ['activePage' => 'bitácora', 'titlePage' => __(' - Bitácora')])

@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
@endsection

@switch(auth()->user()->group)
@case('BAF')
@include('bitacoras.baf.data')
@break
@case('CHAT')
@include('bitacoras.chat.data')
@break
@case('SACMOVIL')
@include('bitacoras.sac_movil.data')
@break
@default

@endswitch
