
@php
$user = Auth::user();
$menu_admin = config('menu-admin');

@endphp


<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Trang chủ</li>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Thông tin shop
                    </a>
                </li>
                <li class="app-sidebar__heading">Quản lý cửa hàng</li>
                @foreach( $menu_admin as $menu )
                <li class="@if($menu['items'][0]['route'] == Route::current()->getName()) mm-active @endif
                    @if($menu['items'][1]['route'] == Route::current()->getName()) mm-active @endif">
                    <a href="#" >
                        <i class="metismenu-icon {{ $menu['icon'] }}"></i>
                        {{ $menu['label'] }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @foreach( $menu['items'] as $item )
                        @if($user->can($item['route']))
                    <ul>
                        <li>
                            <a href="{{ route($item['route']) }}"
                            class="@if($item['route'] == Route::current()->getName()) mm-active @endif">
                                <i class="metismenu-icon"></i>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    </ul>
                        @endif
                    @endforeach
                </li>
                @endforeach


                <li class="app-sidebar__heading">Thống kê</li>

            </ul>
        </div>
    </div>
</div>
