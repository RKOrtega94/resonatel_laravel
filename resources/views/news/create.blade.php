@extends('layouts.app', ['activePage' => "$activePage", 'titlePage' => __(' - Notcias')])

@section('content')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload {
        width: 100%;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Informativos</h4>
                    <p class="card-category">Registrar informativo</p>
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
                            <a href="{{route('news.index')}}" class="btn btn-sm btn-success">
                                <span class="sidebar-mini">
                                    <i class="material-icons">chrome_reader_mode</i>
                                    Regresar
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label" for="title">{{ __('Título') }}</label>
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                    id="input-title" type="text" placeholder="{{ __('Título') }}"
                                    value="{{ old('title') }}" required="true" aria-required="true" />
                                @if ($errors->has('title'))
                                <span id="title-error" class="error text-danger"
                                    for="input-title">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label" for="description">{{ __('Detalle') }}</label>
                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    name="description" id="input-description" type="text"
                                    placeholder="{{ __('Detalle') }}" required="true"
                                    aria-required="true">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <span id="description-error" class="error text-danger"
                                    for="input-description">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label" for="description">{{ __('Imagen / Captura') }}</label>
                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id='img-upload' />
                                @if ($errors->has('description'))
                                <span id="description-error" class="error text-danger"
                                    for="input-description">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script>
    $(document).ready( function() {
$(document).on('change', '.btn-file :file', function() {
var input = $(this),
label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
input.trigger('fileselect', [label]);
});

$('.btn-file :file').on('fileselect', function(event, label) {

var input = $(this).parents('.input-group').find(':text'),
log = label;

if( input.length ) {
input.val(log);
} else {
if( log ) alert(log);
}

});
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#img-upload').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp").change(function(){
readURL(this);
});
});
</script>
@endsection
