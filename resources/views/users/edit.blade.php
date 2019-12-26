@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off"
                    class="form-horizontal">
                    @csrf
                    @method('PATCH')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Edit User') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('user.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Rol') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                        <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                            name="role_id" id="input-role_id" required="true" aria-required="true">
                                            @foreach ($roles as $rol)
                                            <option value="{{$rol->id}}" {{ $rol->id == $user->role_id?'selected':'' }}>
                                                {{ $rol->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role_id'))
                                        <span id="role_id-error" class="error text-danger"
                                            for="input-role_id">{{ $errors->first('role_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Grupo') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('group') ? ' has-danger' : '' }}">
                                        <select class="form-control {{ $errors->has('group') ? ' is-invalid' : '' }}"
                                            name="group" id="input-group" required="true" aria-required="true">
                                            <option value="NA" {{ "NA" == $user->group?'selected':'' }}>
                                                NA
                                            </option>
                                            <option value="BAF" {{ "NA" == $user->group?'selected':'' }}>
                                                Banda Ancha Fija
                                            </option>
                                            <option value="CHAT" {{ "NA" == $user->group?'selected':'' }}>
                                                Soporte Chat
                                            </option>
                                            <option value="PW" {{ "NA" == $user->group?'selected':'' }}>
                                                Página Web
                                            </option>
                                            <option value="CE" {{ "NA" == $user->group?'selected':'' }}>
                                                Campañas Específicas
                                            </option>
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
                                            placeholder="{{ __('Nombre') }}"
                                            value="{{ old('firstName', $user->firstName) }}" required="true"
                                            aria-required="true" />
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
                                            placeholder="{{ __('Apellido') }}"
                                            value="{{ old('lastName', $user->lastName) }}" required="true"
                                            aria-required="true" />
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
                                            placeholder="{{ __('Cédula / Pasaporte') }}"
                                            value="{{ old('dni', $user->dni) }}" required="true" aria-required="true" />
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
                                            value="{{ old('user', $user->user) }}" required="true"
                                            aria-required="true" />
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
                                            value="{{ old('email', $user->email) }}" required />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger"
                                            for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label"
                                    for="input-password">{{ __(' Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            input type="password" name="password" id="input-password"
                                            placeholder="{{ __('Password') }}" />
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
                                            placeholder="{{ __('Confirm Password') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
