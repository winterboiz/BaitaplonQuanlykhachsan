@extends('frontend.master')
@section('content')
    <!-- ACCOUNT -->
    <section class="section-account parallax bg-11">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <h2>REGISTER FORM</h2>
                    <p>If you no have account in lotus Hotel! Register and feeling</p>
                    <form action="#" class="account_form">
                        <div class="field-form">
                            <input type="text" class="field-text" placeholder="User name*">
                        </div>
                        <div class="field-form">
                            <input type="text" class="field-text" placeholder="Email*">
                        </div>
                        <div class="field-form">
                            <input type="password" class="field-text" placeholder="Password*">
                            <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        </div>
                        <div class="field-form field-submit">
                            <button class="awe-btn awe-btn-13">Đăng kí</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END / ACCOUNT -->


@endsection