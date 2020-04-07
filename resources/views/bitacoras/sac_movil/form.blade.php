@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
@endsection

<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <label class="col-sm-3 col-form-label" for="anillamador">{{ __('Anillamador') }}</label>
            <div class="col-sm-9">
                <div class="form-group{{ $errors->has('anillamador') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('anillamador') ? ' is-invalid' : '' }}" name="anillamador"
                        id="input-anillamador" type="text" placeholder="{{ __('Anillamador') }}"
                        value="{{ old('anillamador') }}" required="true" aria-required="true" />
                    @if ($errors->has('anillamador'))
                    <span id="anillamador-error" class="error text-danger"
                        for="input-anillamador">{{ $errors->first('anillamador') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <label class="col-sm-3 col-form-label" for="dni">{{ __('Cédula / RUC') }}</label>
            <div class="col-sm-9">
                <div class="form-group{{ $errors->has('dni') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" id="input-dni"
                        type="text" placeholder="{{ __('Cédula ó RUC') }}" value="{{ old('dni') }}" required="true"
                        aria-required="true" />
                    @if ($errors->has('dni'))
                    <span id="dni-error" class="error text-danger" for="input-dni">{{ $errors->first('dni') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <label class="col-sm-3 col-form-label" for="tmo">{{ __('Duración') }}</label>
            <div class="col-sm-9">
                <div class="form-group{{ $errors->has('tmo') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('tmo') ? ' is-invalid' : '' }}" name="tmo" id="input-tmo"
                        type="text" placeholder="{{ __('Duración (00:00)') }}" value="{{ old('tmo') }}" required="true"
                        aria-required="true" />
                    @if ($errors->has('tmo'))
                    <span id="tmo-error" class="error text-danger" for="input-tmo">{{ $errors->first('tmo') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
