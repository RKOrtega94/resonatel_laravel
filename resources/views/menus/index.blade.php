@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __(' - User Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Menus') }}</h4>
                        <p class="card-category"> {{ __('Gestión de navegación') }}</p>
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Icon') }}
                                    </th>
                                    <th>
                                        {{ __('Nombre') }}
                                    </th>
                                    <th>
                                        {{ __('Brand') }}
                                    </th>
                                    <th>
                                        {{ __('Slug') }}
                                    </th>
                                    <th>
                                        {{ __('Parent') }}
                                    </th>
                                    <th>
                                        {{ __('Estado') }}
                                    </th>
                                    <th>
                                        {{ __('Creation date') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($navigations as $nav)
                                    <tr>
                                        <td>
                                            <i class="material-icons">{{ $nav->icon }}</i>
                                        </td>
                                        <td>
                                            {{ $nav->name }}
                                        </td>
                                        <td>
                                            {{ $nav->brand}}
                                        </td>
                                        <td>
                                            {{ $nav->slug}}
                                        </td>
                                        <td>
                                            @foreach($navigations as $parent)
                                            {{ $nav->parent == $parent->id?$parent->name:'' }}
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $nav->enabled?__('enabled'):__('disabled') }}
                                        </td>
                                        <td>
                                            {{ $nav->created_at }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('menu.destroy', $nav->brand) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a rel="tooltip" class="btn btn-primary btn-link"
                                                    href="{{ route('menu.show', $nav->brand) }}" data-original-title=""
                                                    title="">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('menu.edit', $nav->brand) }}" data-original-title=""
                                                    title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
