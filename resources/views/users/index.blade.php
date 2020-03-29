@extends('layouts.app', ['activePage' => "$activePage", 'titlePage' => __(' - User
Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Usuarios') }}</h4>
                        <p class="card-category"> {{ __('Gestión de usuarios') }}</p>
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
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini"> <i class="material-icons">person_add</i>
                                        {{ __('Agregar usuario') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Nombre') }}
                                    </th>
                                    <th>
                                        {{ __('Cédula / Pasaporte') }}
                                    </th>
                                    <th>
                                        {{ __('Usuario') }}
                                    </th>
                                    <th>
                                        {{ __('Grupo') }}
                                    </th>
                                    <th>
                                        {{ __('Rol') }}
                                    </th>
                                    <th>
                                        {{ __('Email') }}
                                    </th>
                                    <th>
                                        {{ __('Fecha') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->firstName ." ". $user->lastName}}
                                        </td>
                                        <td>
                                            {{ $user->dni }}
                                        </td>
                                        <td>
                                            {{ $user->user }}
                                        </td>
                                        <td>
                                            {{ $user->group }}
                                        </td>
                                        <td>
                                            {{ $user->profile }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->deleted_at?$user->deleted_at:$user->created_at }}
                                        </td>
                                        <td class="td-actions text-right">
                                            @if ($user->deleted_at == null)
                                            @if ($user->id != auth()->id())
                                            <form action="{{ route('user.destroy', $user->user) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('user.edit', $user->user) }}" data-original-title=""
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
                                            @else
                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                href="{{ route('profile.edit') }}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            @endif
                                            @else
                                            <form action="{{ route('archivedusers.destroy', $user->user) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-success btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Are you sure you want to restore this user?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">autorenew</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                            @endif
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
