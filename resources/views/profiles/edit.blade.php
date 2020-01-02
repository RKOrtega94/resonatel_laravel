@extends('layouts.app', ['activePage' => 'profiles-management', 'titlePage' => __(' - Edit Profile')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profiles.update', encrypt($profile->id)) }}" autocomplete="off"
                    class="form-horizontal">
                    @csrf
                    @method('PATCH')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Agregar perfil') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('profiles.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('back') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}"
                                            value="{{ $profile->name }}" required="true" aria-required="true" />
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
                                            name="description" id="input-description" type="text"
                                            placeholder="{{ __('Descripción') }}" value="{{ $profile->description }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('description'))
                                        <span id="description-error" class="error text-danger"
                                            for="input-description">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>{{ __('Icon') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Brand') }}</th>
                                            <th>{{ __('Route') }}</th>
                                            <th>{{ __('Status') }}</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($pages as $page)
                                            <tr>
                                                <td><i class="material-icons">{{ $page->icon }}</i></td>
                                                <td>{{ $page->name}}</td>
                                                <td>{{ $page->brand }}</td>
                                                <td>{{ $page->slug }}</td>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pages[]" value="{{ $page->id }}"
                                                                {{ $profile->menus->pluck('id')->contains($page->id)?'checked':'' }}>
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Save Profile') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
