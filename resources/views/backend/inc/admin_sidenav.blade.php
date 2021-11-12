<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                <img class="mw-100" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ translate('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>

            @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="{{ route('uploaded-files.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                    <i class="las la-folder-open aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
            <!--Blog System-->
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-bullhorn aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Blog System') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('blog.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('All Posts') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('blog-category.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Categories') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- marketing -->
            @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-bullhorn aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Marketing') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{route('newsletters.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Newsletters') }}</span>
                        </a>
                    </li>
                    @endif
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Subscribers') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Website Setup -->
            @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link {{ areActiveRoutes(['website.footer', 'website.header'])}}">
                    <i class="las la-desktop aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Website Setup')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Header')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.footer', ['lang'=>  App::getLocale()] ) }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.footer'])}}">
                            <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.pages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Pages')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Appearance')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Setup & Configurations -->
            @if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Setup & Configurations')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{route('general_setting.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('General Settings')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('smtp_settings.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('SMTP Settings')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Staffs -->
            @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Staffs')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('All staffs')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('roles.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Staff permissions')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('System')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{route('system_server')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Server status')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->