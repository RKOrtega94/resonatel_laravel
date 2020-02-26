@extends('layouts.app', ['activePage' => 'bitácora', 'titlePage' => __(' - Bitácora')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" style="margin-top: 0px;">
                    <form id="saveForm"
                        action="{{ $ticket ?? ''?route('bitacora.update', $ticket['id']??''?$ticket['id']:$ticket['ticket']):route('bitacora.store')}}"
                        method="post" autocomplete="off" class="form-horizontal">
                        @csrf
                        @if ($ticket??'')
                        @method('PATCH')
                        @endif
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
                                    <div id="tmo" style="font-weight:bold"></div>
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
                            @if ($ticket??'')
                            @include('bitacoras.baf.edit')
                            @else
                            @include('bitacoras.baf.form')
                            @endif
                            @break
                            @case('CHAT')
                            @include('bitacoras.chat.form')
                            @break
                            @default
                            {{auth()->user()->group}}
                            @endswitch
                        </div>
                    </form>
                    <div class="card-footer ml-auto mr-auto">
                        @if ($ticket??'')
                        <button type="submit" class="btn btn-success" form="saveForm">{{ __('Guardar') }}</button>
                        <form
                            action="{{ route('bitacora.destroy', $ticket['id']??''?$ticket['id']:$ticket['ticket']) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" data-original-title="" title=""
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                {{__('Eliminar')}}
                            </button>
                        </form>
                        @else
                        <button type="submit" class="btn btn-success" form="saveForm">{{ __('Guardar') }}</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @switch(auth()->user()->group)
        @case('BAF')
        @include('bitacoras.baf.daily')
        @break
        @case('CHAT')
        @include('bitacoras.chat.daily')
        @break
        @default

        @endswitch
    </div>
</div>
@endsection
