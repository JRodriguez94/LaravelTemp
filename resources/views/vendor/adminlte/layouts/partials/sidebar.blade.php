<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get(auth()->user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        {{-- <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form --> --}}

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" id="side-menu">
            {{-- <li class="header">{{ trans('adminlte_lang::message.header') }}</li> --}}
            <!-- Optionally, you can add icons to the links -->
            {!! Form::btnLinkBar('home', 'home', 'Inicio', 'home') !!}
            {{-- {!! Form::btnLinkBar('users', 'users', 'Usuarios', 'users') !!} --}}
            {{--{!! Form::btnLinkBar('products', '#', 'Productos', 'th') !!}--}}
            {{--<li id="users"><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>--}}
            <li class="treeview" id="users">
                <a href="#" ><i class='fa fa-users'></i> <span >Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li id="users-create"><a href="{{route('users.create')}}">Alta de usuario</a></li>
                    <li><a href="{{route('users.index')}}">Listado de usuarios</a></li>
                </ul>
            </li>
            <li class="treeview" id="roles">
                <a href="#" ><i class='fa fa-lock'></i> <span >Roles</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li id="roles-create"><a href="{{route('roles.create')}}">Alta de rol</a></li>
                    <li><a href="{{route('roles.index')}}">Listado de rol</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
