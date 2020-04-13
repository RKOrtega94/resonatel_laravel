@extends('layouts.app', ['activePage' => 'home', 'titlePage' => __(' - Home')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('helpers.passwordalert')
        </div>
        <div class="container-fluid justify-content-end">
            <p class="font-weight-bold text-dark align-content-end">
                Hola,
                @php
                $userLogin = App\User::userLogin(Auth::user()->id);
                $pos = strrpos($userLogin->firstName, ' ');
                echo substr($userLogin->firstName, 0, $pos);
                @endphp
                <br>
                El sol no es suficiente para iluminar todo el planeta, <em>¡También te necesita a ti!</em>
            </p>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection
