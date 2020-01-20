@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Editar Perfil') }}</h4>
              <p class="card-category">{{ __('Información de usuario') }}</p>
            </div>
            <div class="card-body ">
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
                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('firstName') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName"
                      id="input-firstName" type="text" placeholder="{{ __('Nombre') }}"
                      value="{{ old('firstName', auth()->user()->firstName) }}" required="true" aria-required="true" />
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
                    <input class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName"
                      id="input-lastName" type="text" placeholder="{{ __('Apellido') }}"
                      value="{{ old('lastName', auth()->user()->lastName) }}" required="true" aria-required="true" />
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
                    <input class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" id="input-dni"
                      type="text" placeholder="{{ __('Cédula / Pasaporte') }}"
                      value="{{ old('dni', auth()->user()->dni) }}" required="true" aria-required="true" />
                    @if ($errors->has('dni'))
                    <span id="dni-error" class="error text-danger" for="input-dni">{{ $errors->first('dni') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                      id="input-email" type="email" placeholder="{{ __('Email') }}"
                      value="{{ old('email', auth()->user()->email) }}" required />
                    @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger"
                      for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Cambiar contraseña') }}</h4>
              <p class="card-category">{{ __('Contraseña') }}</p>
            </div>
            <div class="card-body ">
              @if (session('status_password'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status_password') }}</span>
                  </div>
                </div>
              </div>
              @endif
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input
                      type="password" name="old_password" id="input-current-password"
                      placeholder="{{ __('Contraseña actual') }}" value="" required />
                    @if ($errors->has('old_password'))
                    <span id="name-error" class="error text-danger"
                      for="input-name">{{ $errors->first('old_password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password">{{ __('Nueva contraseña') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                      id="input-password" type="password" placeholder="{{ __('Nueva contraseña') }}" value="" required />
                    @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger"
                      for="input-password">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label"
                  for="input-password-confirmation">{{ __('Confirmar contraseña') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" name="password_confirmation" id="input-password-confirmation"
                      type="password" placeholder="{{ __('Confirmar contraseña') }}" value="" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Cambiar contraseña') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
