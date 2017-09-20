@extends('layouts.app')

@section('title', 'Podty - Register')

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
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
            <a class="navbar-brand block" href="/"><span class="h1 font-bold">Podty</span></a>
            <section class="m-b-lg">
                <header class="wrapper text-center">
                    <strong>Sign up to find interesting thing</strong>
                </header>
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input placeholder="username" name="name" class="form-control rounded input-lg text-center no-border" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" placeholder="email" class="form-control rounded input-lg text-center no-border" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control rounded input-lg text-center no-border" name="password" placeholder="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-lg btn-info btn-block btn-rounded">
                            <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Register</span>
                        </button>
                        <div class="line line-dashed"></div>
                        <p class="text-muted text-center"><small>Already have an account?</small></p>
                        <a href="login" class="btn btn-lg btn-dark btn-block btn-rounded">Login</a>

                    </form>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p>
            </p>
        </div>
    </footer>
@endsection
