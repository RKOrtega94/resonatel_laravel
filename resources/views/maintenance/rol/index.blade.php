@extends('layouts.app', ['activePage' => 'roles-management', 'titlePage' => __(' - Roles')])
@section('custom-header')

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Roles</h4>
                        <p class="card-category">Roles y permisos</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Name</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha de creación</th>
                                <th>Última modificación</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->name }}</td>
                                    <td>{{ $rol->description }}</td>
                                    <td>{{ $rol->status?'Activo':'Inactivo' }}</td>
                                    <td>{{ $rol->created_at }}</td>
                                    <td>{{ $rol->updated_at }}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ route('roles.destroy', $rol) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                href="{{ route('roles.edit', $rol) }}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-link" data-original-title=""
                                                title=""
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
@endsection
