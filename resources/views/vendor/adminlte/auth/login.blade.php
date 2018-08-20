@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
    <body class="hold-transition login-page">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
                {{--<a href="{{ url('/home') }}"><b>SBELTY APP</b></a>--}}
                <p>
                </p>
            </div><!-- /.login-logo -->

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul><br><br>
                </div>
            @endif

            <div class="login-box-body" style="border: thin; border-style: groove; border-color: #BBBBBB;">
                {{--<p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>--}}
                <p>
                    <h4 align="center">SBELTY APP</h4>
                    <div align="center" >
                        <br><img src="{{asset('images/logoREP001Temp.jpg')}}" alt=""><br><br>
                    </div>
                </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <login-input-field
                            name="{{ config('auth.providers.users.field','email') }}"
                            domain="{{ config('auth.defaults.domain','') }}"
                    ></login-input-field>
                    <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div align="center">
                            <div class="checkbox icheck">
                                <label>
                                    <input style="display:none;" type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                                </label>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div align="center">
                            <button type="submit" class="btn btn btn-info btn-lg btn-block" style="width: 70%; position: relative; background: #1B9AF7">
                                {{ trans('adminlte_lang::message.buttonsign') }}</button><br><br>
                        </div><!-- /.col -->
                    </div>
                </form>

{{--                @include('adminlte::auth.partials.social_login')--}}
                <div align="center">
                    <a href="{{ url('/password/reset') }}" style="color: #BBBBBB; text-decoration: underline">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
                </div>

                {{-- <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a> --}}

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>

@endsection
