@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __(' - Administar usuarios')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Agregar usuario') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('user.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('Regresar a la lista.') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Perfil') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('profile') ? ' has-danger' : '' }}">
                                        <select name="profile" id="input-profile"
                                            class="form-control{{ $errors->has('profile') ? ' is-invalid' : '' }}"
                                            required="true" aria-required="true">
                                            <option value="">{{ __('Seleccione un perfil.') }}</option>
                                            @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('group'))
                                        <span id="group-error" class="error text-danger"
                                            for="input-group">{{ $errors->first('group') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Grupo') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('group') ? ' has-danger' : '' }}">
                                        <select name="group" id="input-group"
                                            class="form-control{{ $errors->has('group') ? ' is-invalid' : '' }}"
                                            required="true" aria-required="true">
                                            <option value="">{{ __('Seleccione una opción') }}</option>
                                            <option value="BAF">BAF</option>
                                            <option value="CHAT">CHAT</option>
                                            <option value="PW">PÁGINA WEB</option>
                                            <option value="CE">CAMPAÑAS ESPECÍFICAS</option>
                                        </select>
                                        @if ($errors->has('group'))
                                        <span id="group-error" class="error text-danger"
                                            for="input-group">{{ $errors->first('group') }}</span>
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
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Apellido') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('lastName') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                                            name="lastName" id="input-lastName" type="text"
                                            placeholder="{{ __('Apellido') }}" value="{{ old('lastName') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('lastName'))
                                        <span id="lastName-error" class="error text-danger"
                                            for="input-lastName">{{ $errors->first('lastName') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Cédula / Pasaporte') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('dni') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                                            name="dni" id="input-dni" type="text"
                                            placeholder="{{ __('Cédula / Pasaporte') }}" value="{{ old('dni') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('dni'))
                                        <span id="dni-error" class="error text-danger"
                                            for="input-dni">{{ $errors->first('dni') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Usuario') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('user') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}"
                                            name="user" id="input-user" type="text" placeholder="{{ __('Usuario') }}"
                                            value="{{ old('user') }}" required="true" aria-required="true" />
                                        @if ($errors->has('user'))
                                        <span id="user-error" class="error text-danger"
                                            for="input-user">{{ $errors->first('user') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" id="input-email" type="email" placeholder="{{ __('Email') }}"
                                            value="{{ old('email') }}" required />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger"
                                            for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label"
                                    for="input-password">{{ __('Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            input type="password" name="password" id="input-password"
                                            placeholder="{{ __('Password') }}" value="" required />
                                        @if ($errors->has('password'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label"
                                    for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" name="password_confirmation"
                                            id="input-password-confirmation" type="password"
                                            placeholder="{{ __('Confirm Password') }}" value="" required />
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
<script>

</script>
@endsection
