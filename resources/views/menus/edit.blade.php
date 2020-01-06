@extends('layouts.app', ['activePage' => $activePage ?? '', 'titlePage' => __(' - User Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('menu.update', $menuItem) }}" autocomplete="off"
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
                                    <a href="{{ route('menu.index') }}"
                                        class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nme') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="text" placeholder="{{ __('name') }}"
                                            value="{{ old('name', $menuItem->name) }}" required="true"
                                            aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('name') }}</span>
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
                                            value="{{ old('slug', $menuItem->slug) }}" required="true"
                                            aria-required="true" />
                                        @if ($errors->has('slug'))
                                        <span id="slug-error" class="error text-danger"
                                            for="input-slug">{{ $errors->first('slug') }}</span>
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
                                            value="{{ old('brand', $menuItem->brand) }}" required="true"
                                            aria-required="true" />
                                        @if ($errors->has('brand'))
                                        <span id="brand-error" class="error text-danger"
                                            for="input-brand">{{ $errors->first('brand') }}</span>
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
                                            name="icon" id="input-icon" type="text" placeholder="{{ __('Icon') }}"
                                            value="{{ old('icon', $menuItem->icon) }}" required="true"
                                            aria-required="true" />
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
                                            <option value="{{ $nav->id }}"
                                                {{ $menuItem->parent == $nav->id ? 'selected' : '' }}>{{ $nav->name }}
                                            </option>
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
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="menu_item"
                                                {{ $menuItem?'checked':'' }}>
                                            {{ __('Is Menu?') }}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
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
