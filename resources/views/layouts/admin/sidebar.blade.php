<?php $setting =  App\Models\Setting::first(); ?>

<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('home')}}">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">
{{--        <li><h3>الرئيسية</h3></li>--}}
        <li class="slide">
            <a class="side-menu__item" href="{{route('home')}}">
            <i class="fe fe-home  side-menu__icon"></i>
            <span class="side-menu__label">الرئيسية</span>
            </a>
        </li>
{{--        @if(in_array(5,admin()->user()->permission_ids) || in_array(1,admin()->user()->permission_ids))--}}
{{--            <li><h3>المستخدمين</h3></li>--}}
{{--            @if( in_array(1,admin()->user()->permission_ids))--}}
                <li class="slide">
                    <a class="side-menu__item" href="{{route('admins.index')}}">
                        <i class="fe fe-users  side-menu__icon"></i>
                        <span class="side-menu__label">المشرفين</span>
                    </a>
                </li>
{{--            @endif--}}
{{--            @if(in_array(5,admin()->user()->permission_ids))--}}
                <li class="slide">
                    <a class="side-menu__item" href="{{route('users.index')}}">
                        <i class="fe fe-user-check side-menu__icon"></i>
                        <span class="side-menu__label">المستخدمين</span>
                    </a>
                </li>
{{--            @endif--}}
            <li class="slide">
                <a class="side-menu__item" href="{{route('countries.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5v14h14V5H5zm4 12H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                        <path
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                    </svg>
                    <span class="side-menu__label">البلدان</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('car_types.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5v14h14V5H5zm4 12H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                        <path
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                    </svg>
                    <span class="side-menu__label">أنواع السيارات</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('reports.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                              opacity=".3"/>
                        <path
                            d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"/>
                    </svg>
                    <span class="side-menu__label">الشكاوى</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('bills.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                              opacity=".3"/>
                        <path
                            d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"/>
                    </svg>
                    <span class="side-menu__label">الفواتير</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('rewords.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                              opacity=".3"/>
                        <path
                            d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"/>
                    </svg>
                    <span class="side-menu__label">المكافئات</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('commissions.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                              opacity=".3"/>
                        <path
                            d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"/>
                    </svg>
                    <span class="side-menu__label">العمولة</span>
                </a>
            </li>
{{--        @endif--}}
{{--        @if(in_array(72,admin()->user()->permission_ids))--}}
{{--            <li class="slide">--}}
{{--                <a class="side-menu__item" href="{{route('sliders.index')}}">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"--}}
{{--                         class="side-menu__icon">--}}
{{--                        <path d="M0 0h24v24H0V0z" fill="none"/>--}}
{{--                        <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>--}}
{{--                        <path--}}
{{--                            d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>--}}
{{--                    </svg>--}}
{{--                    <span class="side-menu__label">صور العرض</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--        @if(in_array(23,admin()->user()->permission_ids))--}}
            <li class="slide">
                <a class="side-menu__item" href="{{route('products.index')}}">
                    <i class="fe fe-menu  side-menu__icon"></i>
                    <span class="side-menu__label">الاعلانات</span>
                </a>
            </li>
{{--        @endif--}}

{{--        @if(in_array(42,admin()->user()->permission_ids))--}}
            <li class="slide">
                <a class="side-menu__item" href="{{route('notifications.index')}}">
                    <i class="fe fe-bell side-menu__icon "></i>
                    <span class="side-menu__label">الاشعارات</span>
                </a>
            </li>
{{--        @endif--}}

{{--        @if(in_array(19,admin()->user()->permission_ids))--}}
            <li class="slide">
                <a class="side-menu__item" href="{{route('contact_categories.index')}}">
                    <i class="fa fa-comments-o side-menu__icon "></i>
                    <span class="side-menu__label">تواصل معنا</span>
                </a>
            </li>
{{--        @endif--}}
{{--        @if(in_array(22,admin()->user()->permission_ids))--}}
            <li class="slide">
                <a class="side-menu__item" href="{{route('packages.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z"
                            opacity=".3"/>
                        <path
                            d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/>
                    </svg>
                    <span class="side-menu__label">باقات التاجر</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('ad_packages.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z"
                            opacity=".3"/>
                        <path
                            d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/>
                    </svg>
                    <span class="side-menu__label">باقات الاعلانات</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('settings.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm0 12.5c-2.49 0-4.5-2.01-4.5-4.5S9.51 7.5 12 7.5s4.5 2.01 4.5 4.5-2.01 4.5-4.5 4.5z"
                            opacity=".3"/>
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-12.5c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 5.5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/>
                    </svg>
                    <span class="side-menu__label">الاعدادات</span>
                </a>
            </li>
{{--        @endif--}}

    </ul>
</aside>
<!--/APP-SIDEBAR-->
