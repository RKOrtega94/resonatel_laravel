@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __(' - User Management')])
@section('content')
<style>
    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 1.9em;
    }

    #sortable li span {
        position: relative;
        margin-left: -1.3em;
    }
</style>
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
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini"> <i class="material-icons">add_box</i>
                                        {{ __('add') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="container">
                            <hr>
                            <ul id="sortable">
                                @foreach ($navigations as $navItem)
                                <li id="{{ $navItem->id }}" class="tn-sm btn-dark text-white text-bold btn-round">
                                    <div class="row">
                                        <div class="col">
                                            <span>
                                                <i class="material-icons">{{ $navItem->icon }}</i>
                                                {{ $navItem->name }}
                                            </span>
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{ route('menu.update', encrypt($navItem->id))}}" class="text-white"
                                                title="Editar">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('menu.destroy', encrypt($navItem->id))}}" class="text-danger"
                                                title="Eliminar">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
    } );
</script>
@endsection
