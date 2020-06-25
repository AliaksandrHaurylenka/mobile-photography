@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">



            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('menu_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.menu.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('main_menu_access')
                    <li>
                        <a href="{{ route('admin.main_menus.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.main-menu.title')</span>
                        </a>
                    </li>@endcan

                    @can('menu_social_access')
                    <li>
                        <a href="{{ route('admin.menu_socials.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.menu-social.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('photo_image_page_access')
            <li>
                <a href="{{ route('admin.photo_image_pages.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.photo_image_page.title')</span>
                </a>
            </li>@endcan

            @can('portfolio_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.portfolio-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('portfolio_access')
                    <li>
                        <a href="{{ route('admin.portfolios.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.portfolio.title')</span>
                        </a>
                    </li>@endcan

                    @can('category_access')
                    <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.categories.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('programs_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.programs.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('program_access')
                    <li>
                        <a href="{{ route('admin.programs.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.program.title')</span>
                        </a>
                    </li>@endcan

                    @can('subprogramme_access')
                    <li>
                        <a href="{{ route('admin.subprogrammes.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.subprogramme.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>
            @endcan

            @can('price_access')
            <li>
                <a href="{{ route('admin.prices.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.price.title')</span>
                </a>
            </li>
            @endcan

            @can('comment_access')
            <li>
                <a href="{{ route('admin.comments.index') }}">
                    <i class="fa fa-commenting"></i>
                    <span>@lang('quickadmin.comment.title')</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">{{$commentsCount}}</small>
                    </span>
                </a>
            </li>
            @endcan








            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

