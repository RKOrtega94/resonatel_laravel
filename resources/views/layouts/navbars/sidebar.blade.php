<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('images/bg1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="/" class="simple-text logo-normal">
            <img src="{{ asset('images/icon.ico') }}" alt="RESONATEL" class="icon-bar navbar-brand border-0" width="40">
            {{ __('RESONATEL') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @foreach ($menu as $key=>$item)
            @if ($item['parent'] != 0)
            @break
            @endif
            @if ($item['user_id'] == Auth::user()->id )
            @if ($item['submenu'] == [])
            <li class="nav-item{{ $activePage == $item['brand'] ? ' active' : '' }}">
                <a class="nav-link" href="{{ $item['slug']!='#'?route($item['slug']):'#' }}">
                    <i class="material-icons">{{ $item['icon'] }}</i>
                    <p>{{ $item['name'] }}</p>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{ $activePage == $item['brand'] ? 'active' : '' }}" data-toggle="collapse"
                    href="#{{$item['brand']}}" aria-expanded="true">
                    <i class="material-icons">{{$item['icon']}}</i>
                    <p>{{ $item['name'] }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="{{$item['brand']}}">
                    <ul class="nav">
                        @foreach ($item['submenu'] as $submenu)
                        @if ($submenu['user_id'] == Auth::user()->id)
                        <li class="nav-item {{ $activePage == $submenu['brand'] ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route($submenu['slug']) }}">
                                <span class="sidebar-mini"> <i class="material-icons">{{$submenu['icon']}}</i> </span>
                                <span class="sidebar-normal">{{ $submenu['name'] }} </span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </li>
            @endif
            @endif
            @endforeach
        </ul>
    </div>
</div>
