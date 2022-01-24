@extends('auth.layout')

@section('content')
    <div class="content ">
        <div class="container-fluid">
            <div class="row no-gutters align-items-center justify-content-center h-100">
                <div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="text-center mb-4">
                                <div class="avatar avatar-label-primary avatar-circle widget12">
                                    <div class="avatar-display">
                                        <i class="fa fa-user-alt"></i>
                                    </div>
                                </div>
                            </div>
                            @if (session('errorMessage'))
                                <div class="alert alert-danger">{!! session('errorMessage') !!}</div>
                            @elseif (session('successMessage'))
                                <div class="alert alert-success">{!! session('successMessage') !!}</div>
                            @endif
                            {!! Form::open(['method' => 'post', 'route' => ['login-post']]) !!}
                                <div class="form-group">
                                    <div class="float-label float-label-lg">
                                        <input class="form-control form-control-lg" type="username" id="username" name="username" placeholder="Please insert your username">
                                        <label for="username">Username</label>
                                    </div>
                                    @error('username')
                                        <small class="text-danger">{{ '*'. $errors->first('username') }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="float-label float-label-lg">
                                        <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Please insert your password">
                                        <label for="password">Password</label>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ '*'. $errors->first('password') }}</small>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-control-lg custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                            <label class="custom-control-label" for="remember">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-label-primary btn-lg btn-widest">Login</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
