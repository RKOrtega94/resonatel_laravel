@extends('layouts.app', ['activePage' => 'indicator', 'titlePage' => __(' - Indicadores')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 style="margin: 0px">{{ __('Indicators') }}</h3>
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
                                <a href="{{ route('indicators.create') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini"> <i class="material-icons">add_box</i>
                                        {{ __('Add') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="data" class="table table-striped" style="width: 100%">
                                    <thead class="text-primary">
                                        <th>{{ __('Indicador') }}</th>
                                        <th>{{ __('Campaña') }}</th>
                                        <th>{{ __('Descripción') }}</th>
                                        <th>{{ __('Meta') }}</th>
                                        <th class="td-actions text-right" style="width: 50px">{{ __('Opciones') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($indicators as $item)
                                        <tr>
                                            <td>
                                                {{ __($item->name) }}
                                            </td>
                                            <td>
                                                {{ __($item->group) }}
                                            </td>
                                            <td>
                                                {{ __($item->description) }}
                                            </td>
                                            <td>
                                                @if ($item->signo == '>')
                                                {{ __("Debe ser mayor a $item->meta %") }}
                                                @else
                                                {{ __("Debe ser menor a $item->meta %") }}
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">
                                                <form action="{{ route('indicators.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('indicators.edit', $item) }}"
                                                        data-original-title="" title="">
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
</div>
@endsection
