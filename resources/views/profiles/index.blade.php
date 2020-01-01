@extends('layouts.app', ['activePage' => 'profiles-management', 'titlePage' => __(' - Profiles Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Perfiles') }}</h4>
                        <p class="card-category"> {{ __('Gestión de roles') }}</p>
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
                                <a href="{{ route('profiles.create') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini"> <i class="material-icons">person_add</i>
                                        {{ __('add') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Perfil') }}
                                    </th>
                                    <th>
                                        {{ __('Descripción') }}
                                    </th>
                                    <th>
                                        {{ __('creation date') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($profile as $profile)
                                    <tr>
                                        <td>
                                            {{ $profile->name }}
                                        </td>
                                        <td>
                                            {{ $profile->description }}
                                        </td>
                                        <td>
                                            {{ $profile->created_at }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('profiles.destroy', encrypt($profile->id)) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')

                                                <a rel="tooltip" class="btn btn-primary btn-link"
                                                    href="{{ route('profiles.show', encrypt($profile->id)) }}"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('profiles.edit', encrypt($profile->id)) }}"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                @if ($profile->id != 1)
                                                <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Are you sure you want to delete this Profile?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                @endif
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