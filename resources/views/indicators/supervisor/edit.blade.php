@extends('layouts.app', ['activePage' => 'user-indicator', 'titlePage' => __(' - Indicadores')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('indicator.update', encrypt($user)) }}">
                    @method('PATCH')
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"> {{ $user->profiles[0]->name.": $user->lastName $user->firstName" }}
                            </h4>
                            <p class="card-category">{{ $user->profiles[0]->description.": $user->group" }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Indicador</th>
                                            <th>Descripción</th>
                                            <th>Ponderación</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($indicators as $indicator)
                                            <tr>
                                                <td>
                                                    {{ $indicator->name }}
                                                </td>
                                                <td>
                                                    {{ $indicator->description }}
                                                    {{ $indicator->signo==">"?'Debe ser mayor a ':'Debe ser menor a'  }}
                                                    {{ "$indicator->meta %" }}
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="indicators[]" value="{{ $indicator->id }}"
                                                                {{ $user->indicators->pluck('id')->contains($indicator->id)?'checked':'' }}>
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
