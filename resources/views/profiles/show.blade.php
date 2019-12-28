@extends('layouts.app', ['activePage' => 'profiles-management', 'titlePage' => __(' - View Profile')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ $profile->name }}</h4>
                        <p class="card-category"> {{ $profile->description }}</p>
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
                                <a href="{{ route('profiles.index') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini"> <i class="material-icons">person_add</i>
                                        {{ __('Back') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
