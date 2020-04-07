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
                                <div class="col">
                                    <label class="col-form-label" for="codigo">{{ __('Código VT') }}</label>
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
                                <div class="col">
                                    <label class="col-form-label">{{ __('Número de servicio') }}</label>
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
                                <div class="col">
                                    <label class="col-form-label">{{ __('Fecha de reporte') }}</label>
                                    <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                                            name="date" id="input-date" type="text"
                                            placeholder="{{ __('Fecha de reporte') }}" value="{{ old('date') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('date'))
                                        <span id="date-error" class="error text-danger"
                                            for="input-date">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">{{ __('Nombre del cliente') }}</label>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="text"
                                            placeholder="{{ __('Nombre del cliente') }}" value="{{ old('name') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">{{ __('Cédula del cliente') }}</label>
                                    <div class="form-group{{ $errors->has('dni') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                                            name="dni" id="input-dni" type="text"
                                            placeholder="{{ __('Cédula del cliente') }}" value="{{ old('dni') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('dni'))
                                        <span id="dni-error" class="error text-danger"
                                            for="input-dni">{{ $errors->first('dni') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">{{ __('Contacto') }}</label>
                                    <div class="form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                                            name="contact" id="input-contact" type="text"
                                            placeholder="{{ __('Contacto') }}" value="{{ old('contact') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('contact'))
                                        <span id="contact-error" class="error text-danger"
                                            for="input-contact">{{ $errors->first('contact') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--Zona para hacer drag and drop de imagen-->
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
