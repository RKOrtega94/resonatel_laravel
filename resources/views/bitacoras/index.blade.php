@extends('layouts.app', ['activePage' => 'bitácora', 'titlePage' => __(' - Bitácora')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form action="{{route('bitacora.store')}}" method="post" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card" style="margin-top: 0px;">
                        <div class="card-header card-header-success">
                            <h3 style="margin: 0px">{{ __('Registro de incidencias') }}</h3>
                            <p class="card-category">{{ __('Registro de bitácora') }}</p>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <div id="tmo"></div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('bitacora.index') }}" class="btn btn-sm btn-primary">
                                        <span class="sidebar-mini">
                                            <i class="material-icons">storage</i>
                                            {{ __('Data') }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                            @switch(auth()->user()->group)
                            @case('BAF')
                            @include('bitacoras.baf.form')
                            @break
                            @case(2)

                            @break
                            @default
                            {{auth()->user()->group}}
                            @endswitch
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @switch(auth()->user()->group)
        @case('BAF')
        @include('bitacoras.baf.daily')
        @break
        @case(2)

        @break
        @default

        @endswitch
    </div>
</div>
@endsection
