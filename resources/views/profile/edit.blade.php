@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
    <div class="container-fluid">

        @if (auth()->user()->created_at == auth()->user()->updated_at)
        <div class="col-lg-12 col-md-12" style="margin-top: 0px">
            <div class="card card-stats" style="margin-top: 0px">
                <div class="card-header card-header-danger card-header-icon" style="margin-top: 0px">
                    <div class="card-icon">
                        <i class="material-icons">report</i>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-muted">Problemas de seguridad</h6>
                        <p class="card-title">Es necesario realiazar el cambio de contraseña de su perfil.</p>
                    </div>
                </div>
            </div>
        </div>
        @include('profile.password')
        @else
        @include('profile.profile')
        @include('profile.password')
        @endif

    </div>
</div>
@endsection
