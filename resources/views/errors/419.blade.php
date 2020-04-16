@extends('layouts.app', ['activePage' => '', 'titlePage' => __(' - 404')])

@section('content')
<div class="content">
    <div class="container">
        <div class="text-center">
            <div class="logo">
                <h1>419</h1>
            </div>
            <p class="lead text-muted">Oops, an error has occurred. Session expired!</p>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
            <div class="clearfix"></div>
            <div class="sr-only">
                &nbsp;
            </div>
        </div>
    </div>
</div>
@endsection
