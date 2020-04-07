@extends('layouts.app', ['activePage' => 'home', 'titlePage' => __(' - Home')])
@section('content')
<style>
    .mcarousel {
        width: 100%;
        overflow: auto;
        position: relative;
        padding: 30px;
        display: flex;
        justify-content: center;
    }

    .mcarousel__container {
        white-space: nowrap;
        margin: 80px 0px;
        padding-bottom: 10px;
    }

    .mcarousel-item {
        width: 300px;
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
        margin-right: 10px;
        display: inline-block;
        cursor: pointer;
        transition: 450ms;
        transform-origin: center left;
    }

    .mcarousel-item:hover~.mcarousel-item {
        transform: translate3d(100px, 0, 0)
    }

    .mcarousel__container:hover .mcarousel-item {
        opacity: 0.3;
    }

    .mcarousel__container:hover .mcarousel-item:hover {
        transform: scale(1.5);
        opacity: 1;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('helpers.passwordalert')

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <video class="video-fluid z-depth-1" autoplay="true" loop controls poster="./images/CNT_Logo.svg.png">
                        <source src="./video/cnt_quedate_en_casa.mp4" type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script>
    const video = document.querySelector('video')
    video.volume = 0.2
    video.play()
</script>
@endsection
