@extends('frontend.master')
@section('content')
    <section class="section-account parallax bg-11">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <h2>Đăng Nhập</h2>
                    <p>Đăng nhập để đặt phòng và nhận hỗ trợ tốt nhất</p>
                    <form action="{{ route('frontend.home.postlogin') }}" method="post" class="account_form">
                        {{ csrf_field() }}
                        <div class="field-form">
                            <input type="text" name="username" class="field-text" placeholder="User name">
                            <strong><span class="help-block alert-danger">{{ $errors->first('username') }}</span></strong>
                        </div>
                        <div class="field-form">
                            <input type="password" name="password" class="field-text" placeholder="Password">
                            <strong><span class="help-block alert-danger">{{ $errors->first('password') }}</span></strong>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {!! session('error') !!}
                            </div>
                        @endif
                        <div class="field-form field-submit row d-flex justify-content-between">
                            <button type="submit" class="awe-btn awe-btn-13">Login</button>
                            <a  href="{{ url('register/facebook') }}" class="awe-btn awe-btn-13">Đăng nhập với facebook </a>
                        </div>
                        <span class="account-desc">Bạn không có tài khoản  -  <a href="/register">Đăng kí ngay</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection