@extends('layouts.app', ['activePage' => $activePage, 'titlePage' => __(' - User Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Visita técnica no atendida o fuera de tiempo') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <!--<div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('user.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('Regresar a la lista.') }}</a>
                                </div>
                            </div>-->
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="codigo">{{ __('Código') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}"
                                            name="codigo" id="input-codigo" type="text" placeholder="{{ __('Código') }}"
                                            value="{{ old('codigo') }}" required="true" aria-required="true" />
                                        @if ($errors->has('codigo'))
                                        <span id="codigo-error" class="error text-danger"
                                            for="input-codigo">{{ $errors->first('codigo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Servicio') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('servicio') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('servicio') ? ' is-invalid' : '' }}"
                                            name="servicio" id="input-servicio" type="text"
                                            placeholder="{{ __('Servicio') }}" value="{{ old('servicio') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('servicio'))
                                        <span id="servicio-error" class="error text-danger"
                                            for="input-servicio">{{ $errors->first('servicio') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('firstName') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
                                            name="firstName" id="input-firstName" type="text"
                                            placeholder="{{ __('Nombre') }}" value="{{ old('firstName') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('firstName'))
                                        <span id="firstName-error" class="error text-danger"
                                            for="input-firstName">{{ $errors->first('firstName') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
