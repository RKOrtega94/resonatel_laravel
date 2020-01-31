<div class="col-lg-5 col-md-6" style="margin-top: 0px">
    <div class="card card-stats" style="margin-top: 0px">
        <div class="card-header card-header-success card-header-icon" style="margin-top: 0px">
            <div class="card-icon">
                <i class="material-icons">person</i>
            </div>
            <div class="card-body">
                <p class="card-title">{{ auth()->user()->lastName}} {{ auth()->user()->firstName }}</p>
                <p class="card-title">{{ __('Rol: ') }}
                    <span class="card-category">
                        @foreach ($profiles as $profile)
                        @if ($profile->users->pluck('id')->contains(auth()->user()->id))
                        {{ __($profile->name) }}
                        @endif
                        @endforeach
                    </span>
                </p>
                <p class="card-title">{{ __("Campaña:") }} <span
                        class="card-category">{{ auth()->user()->group }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
