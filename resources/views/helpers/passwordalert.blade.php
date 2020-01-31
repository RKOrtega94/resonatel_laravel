<div class="col-lg-7 col-md-6" style="margin-top: 0px">
    @if (auth()->user()->created_at == auth()->user()->updated_at)
    <div class="card card-stats" style="margin-top: 0px">
        <div class="card-header card-header-danger card-header-icon" style="margin-top: 0px">
            <div class="card-icon">
                <i class="material-icons">report</i>
            </div>
            <div class="card-body">
                <h6 class="card-title text-muted">Problemas de seguridad</h6>
                <p class="card-title">Es necesario realiazar el cambio de contraseña de su perfil.</p>
                <a href="{{ route('profile.edit') }}" class="card-link text-danger">Cambiar
                    contraseña</a>
            </div>
        </div>
    </div>
    @endif
</div>
