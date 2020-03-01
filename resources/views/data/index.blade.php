@extends('layouts.app', ['activePage' => 'bitácora', 'titlePage' => __(' - Bitácora')])

@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@switch(auth()->user()->group)
@case('BAF')
@include('data.baf.data')
@break
@case('CHAT')
@include('data.chat.data')
@break
@default

@endswitch
