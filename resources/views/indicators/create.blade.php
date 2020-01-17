@extends('layouts.app', ['activePage' => 'indicator', 'titlePage' => __(' - Indicadores')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('indicators.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Agregar usuario') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('indicators.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Indicador') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="name" placeholder="{{ __('Indicator') }}"
                                            value="{{ old('name') }}" required />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <input
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                            name="description" id="input-description" type="description"
                                            placeholder="{{ __('Descripción') }}" value="{{ old('description') }}"
                                            required />
                                        @if ($errors->has('description'))
                                        <span id="description-error" class="error text-danger"
                                            for="input-description">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Meta (%)') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('meta') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('meta') ? ' is-invalid' : '' }}"
                                            name="meta" id="input-meta" type="meta" placeholder="{{ __('Meta %') }}"
                                            value="{{ old('meta') }}" required />
                                        @if ($errors->has('meta'))
                                        <span id="meta-error" class="error text-danger"
                                            for="input-meta">{{ $errors->first('meta') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Signo') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('signo') ? ' has-danger' : '' }}">
                                        <select name="signo" id="input-signo"
                                            class="form-control{{ $errors->has('signo') ? ' is-invalid' : '' }}">
                                            <option value=">">{{ __('Mayor') }}</option>
                                            <option value="<">{{ __('Menor') }}</option>
                                        </select>
                                        @if ($errors->has('signo'))
                                        <span id="signo-error" class="error text-danger"
                                            for="input-signo">{{ $errors->first('signo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
