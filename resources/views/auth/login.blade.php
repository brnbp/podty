@extends('layouts.app')

@section('title', 'Podty - Sign In')

@section('head')
    <style>
        .body {
            background-image: url(/img/join-low-darker.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            height: 100vh;
        }
    </style>
@endsection

@section('content')
    @include('header')
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl">
            <a class="navbar-brand block" href="/"><span class="h1 font-bold">Podty</span></a>
            <section class="m-b-lg">
                <header class="wrapper text-center">
                    <strong>Sign in to get in touch</strong>
                </header>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" @if(!$errors->has('name')) hidden @endif>
                        @if ($errors->has('name'))
                            <span class="help-block text-center">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control rounded input-lg text-center no-border" name="name" value="{{ old('name') }}" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control rounded input-lg text-center no-border" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 col-xs-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" @if(old('remember')) checked @endif> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-lg btn-info btn-block btn-rounded">
                        <i class="icon-arrow-right pull-right"></i>
                        <span class="m-r-n-lg">Login</span>
                    </button>
                    <div class="text-center m-t m-b"><a href="{{ url('password/reset') }}"><small>Forgot password?</small></a></div>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a href="{{url('register')}}" class="btn btn-lg btn-dark btn-block btn-rounded">Create an account</a>
                </form>
            </section>
        </div>
    </section>
@endsection
