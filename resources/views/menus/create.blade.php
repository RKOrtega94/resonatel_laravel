@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __(' - Create Profile')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('menu.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Agregar perfil') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('menu.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('back') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}"
                                            value="{{ old('name') }}" required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Brand') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('brand') ? ' has-danger' : '' }}">
                                        <input type="text"
                                            class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}"
                                            name="brand" id="input-brand" type="text" placeholder="{{ __('Brand') }}"
                                            value="{{ old('brand') }}" required="true" aria-required="true" />
                                        @if ($errors->has('brand'))
                                        <span id="brand-error" class="error text-danger"
                                            for="input-brand">{{ $errors->first('brand') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                        <input type="text"
                                            class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                            name="slug" id="input-slug" type="text" placeholder="{{ __('Slug') }}"
                                            value="{{ old('slug') }}" required="true" aria-required="true" />
                                        @if ($errors->has('slug'))
                                        <span id="slug-error" class="error text-danger"
                                            for="input-slug">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Icon') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
                                        <input type="text"
                                            class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}"
                                            name="brand" id="input-icon" type="text" placeholder="{{ __('Icon') }}"
                                            value="{{ old('icon') }}" required="true" aria-required="true" />
                                        @if ($errors->has('icon'))
                                        <span id="icon-error" class="error text-danger"
                                            for="input-icon">{{ $errors->first('icon') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Prent') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('parent') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}"
                                            name="parent" id="input-patent" required="true" aria-required="true">
                                            <option value="0">No parent</option>
                                            @foreach ($navs as $nav)
                                            @if ($nav->parent == 0)
                                            <option value="{{ $nav->id }}">{{ $nav->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('parent'))
                                        <span id="parent-error" class="error text-danger"
                                            for="input-parent">{{ $errors->first('parent') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Add Profile') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection