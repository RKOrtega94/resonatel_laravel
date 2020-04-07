@extends('layouts.app', ['activePage' => "$activePage", 'titlePage' => __(' - Notcias')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">{{ __('Informativos') }}</h4>
                        <p class="card-category"> {{ __('Gestión de informativos') }}</p>
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
                            <div class="col-12 text-right">
                                <a href="{{ route('news.create') }}" class="btn btn-sm btn-success">
                                    <span class="sidebar-mini"> <i class="material-icons">chrome_reader_mode</i>
                                        {{ __('Agregar informativo') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Título') }}
                                    </th>
                                    <th>
                                        {{ __('Detalle') }}
                                    </th>
                                    <th>
                                        {{ __('Imagen') }}
                                    </th>
                                    <th>
                                        {{ __('Fecha') }}
                                    </th>
                                    <th>
                                        {{ __('Equipo/s') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot class=" text-primary">
                                    <th>
                                        {{ __('Título') }}
                                    </th>
                                    <th>
                                        {{ __('Detalle') }}
                                    </th>
                                    <th>
                                        {{ __('Imagen') }}
                                    </th>
                                    <th>
                                        {{ __('Fecha') }}
                                    </th>
                                    <th>
                                        {{ __('Equipo/s') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
