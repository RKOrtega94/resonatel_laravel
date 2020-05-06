@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
@endsection

<div class="row">
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('anillamador') ? ' has-danger' : '' }}">
            <label class="form-label" for="anillamador">{{ __('Anillamador') }}</label>
            <input class="form-control{{ $errors->has('anillamador') ? ' is-invalid' : '' }}" name="anillamador"
                id="input-anillamador" type="text" placeholder="{{ __('Anillamador') }}"
                value="{{ old('anillamador') }}" required="true" aria-required="true" />
            @if ($errors->has('anillamador'))
            <span id="anillamador-error" class="error text-danger"
                for="input-anillamador">{{ $errors->first('anillamador') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('dni') ? ' has-danger' : '' }}">
            <label class="form-label" for="dni">{{ __('Cédula / RUC') }}</label>
            <input class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" id="input-dni"
                type="text" placeholder="{{ __('Cédula ó RUC') }}" value="{{ old('dni') }}" required="true"
                aria-required="true" />
            @if ($errors->has('dni'))
            <span id="dni-error" class="error text-danger" for="input-dni">{{ $errors->first('dni') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('ticket') ? ' has-danger' : '' }}">
            <label class="form-label" for="ticket">{{ __('Ticket') }}</label>
            <input class="form-control{{ $errors->has('ticket') ? ' is-invalid' : '' }}" name="ticket" id="input-ticket"
                type="text" placeholder="{{ __('Ticket') }}" value="{{ old('ticket') }}" required="true"
                aria-required="true" />
            @if ($errors->has('ticket'))
            <span id="ticket-error" class="error text-danger" for="input-ticket">{{ $errors->first('ticket') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('tmo') ? ' has-danger' : '' }}">
            <label class="form-label" for="tmo">{{ __('Duración') }}</label>
            <input class="form-control{{ $errors->has('tmo') ? ' is-invalid' : '' }}" name="tmo" id="input-tmo"
                type="text" placeholder="{{ __('Duración (00:00)') }}" value="{{ old('tmo') }}" required="true"
                aria-required="true" />
            @if ($errors->has('tmo'))
            <span id="tmo-error" class="error text-danger" for="input-tmo">{{ $errors->first('tmo') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('tipo') ? ' has-danger' : '' }}">
            <label class="form-label" for="tmo">{{ __('Tipo de gestión') }}</label>
            <select name="tipo" id="input-tipo"
                class="form-control selectpicker {{ $errors->has('tipo') ? ' is-invalid' : '' }}" required='true'>
                <option value="">{{ __('Seleccione una opción') }}</option>
                <option value="Configuracion de modem">Configuracion de modem</option>
                <option value="Cambio de clave">Cambio de clave</option>
                <option value="Comercial">Comercial</option>
                <option value="VT/ VT ordenes generadas">VT/ VT ordenes generadas</option>
                <option value="Facturación">Facturación</option>
                <option value="Intención retiro">Intención retiro</option>
                <option value="Sin tono/ruido en la línea">Sin tono/ruido en la línea</option>
            </select>
            @if ($errors->has('tipo'))
            <span id="tipo-error" class="error text-danger" for="input-tipo">{{ $errors->first('tipo') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-2" id="div_abierto">
        <div class="row">
            <div class="form-check" style="margin: 15px">
                <label class="form-check-label">
                    <input id="abierto" class="form-check-input" type="checkbox" name="status"
                        {{ old('status')?'checked':'' }} onclick="checkFluency()">
                    {{ __('Ticket abierto?') }}
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-2" id="div_escalado_n2">
        <div class="form-check" style="margin: 15px">
            <label class="form-check-label">
                <input id="escalado_n2" class="form-check-input" type="checkbox" name="escalado_n2"
                    {{ old('escalado_n2')?'checked':'' }} onclick="checkFluency()">
                {{ __('Se escaló el ticket?(N2 / VT)') }}
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
            </label>
        </div>
    </div>
    <div id="escalado" class="col-lg-4" hidden>
        <div class="form-pir{{ $errors->has('pir') ? ' has-danger' : '' }}">
            <label class="form-label">{{ __('PIR') }}</label>
            <select name="pir" id="input-pir"
                class="form-control selectpicker {{ $errors->has('pir') ? ' is-invalid' : '' }}">
                <option value="N/A">{{ __('Seleccione una opción') }}</option>
                <option value="PETICIÓN / COMERCIAL">PETICIÓN / COMERCIAL</option>
                <option value="RECLAMO / FACTURACIÓN">RECLAMO / FACTURACIÓN</option>
                <option value="RECLAMO / QUEJA DE ATENCIÓN">RECLAMO / QUEJA DE ATENCIÓN</option>
                <option value="SOPORTE / COMERCIAL">SOPORTE / COMERCIAL</option>
                <option value="SOPORTE / TÉCNICO">SOPORTE / TÉCNICO</option>
            </select>
            @if ($errors->has('pir'))
            <span id="pir-error" class="error text-danger" for="input-pir">{{ $errors->first('pir') }}</span>
            @endif
        </div>
        <br>
    </div>
    <div class="col-lg-12">
        <div class="form-group{{ $errors->has('coment') ? ' has-danger' : '' }}">
            <label class="form-label" for="tmo">{{ __('Comentario') }}</label>
            <textarea class="form-control{{ $errors->has('coment') ? ' is-invalid' : '' }}" name="coment"
                id="input-coment" type="text" placeholder="{{ __('Comentario') }}"
                aria-required="true">{{ old('coment') }}</textarea>
            @if ($errors->has('coment'))
            <span id="coment-error" class="error text-danger" for="input-coment">{{ $errors->first('coment') }}</span>
            @endif
        </div>
    </div>
</div>
<script>
    var check = document.getElementById('escalado_n2');
  var abierto = document.getElementById('abierto');
  if(check.checked){
    document.getElementById('div_abierto').setAttribute("hidden", "true");
      document.getElementById('escalado').removeAttribute("hidden");
  } else {
    document.getElementById('div_abierto').removeAttribute("hidden");
    document.getElementById('escalado').setAttribute("hidden", "true")
  }
  if(abierto.checked){
    document.getElementById('div_escalado_n2').setAttribute("hidden", "true");
  } else {
    document.getElementById('div_escalado_n2').removeAttribute("hidden");
  }
    function checkFluency()
{
  var check = document.getElementById('escalado_n2');
  var abierto = document.getElementById('abierto');
  if(check.checked){
    document.getElementById('div_abierto').setAttribute("hidden", "true");
      document.getElementById('escalado').removeAttribute("hidden");
  } else {
    document.getElementById('div_abierto').removeAttribute("hidden");
    document.getElementById('escalado').setAttribute("hidden", "true")
  }
  if(abierto.checked){
    document.getElementById('div_escalado_n2').setAttribute("hidden", "true");
  } else {
    document.getElementById('div_escalado_n2').removeAttribute("hidden");
  }
}
</script>