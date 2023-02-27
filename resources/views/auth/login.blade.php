@extends('layout.app')

@section('title')
    Login
@endsection

@section('body')
<section id="contact" class="main-contact-form-area pdb100">
    <div class="container">
        <div class="row">

            <div class="col-xl-6">
                <div class="contact-info-box-style1">
                    <div class="box1"></div>
                    <div class="title">
                        <h2>Login Here</h2>
                        <p>And start enjoying free and secure transactions.</p>
                    </div>

                    <ul class="contact-info-1">
                        <li>
                            <div class="icon">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="text">
                                <p>Login</p>
                                <h3>Create an account with your basic details.</h3>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fa fa-lock"></span>
                            </div>
                            <div class="text">
                                <p>Secure your account</p>
                                <h3>Confirm OTP, set pin, set question and answer</h3>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fa fa-arrow-up"></span>
                            </div>
                            <div class="text">
                                <p>Start transactions</p>
                                <h3>Send or receive money</h3>
                            </div>
                        </li>
                    </ul>

                    <div class="bottom-box">
                        <div class="btn-box">
                            {{-- <a href="login"><i class="fas fa-arrow-down"></i>Login</a> --}}
                        </div>
                        <div class="footer-social-link-style1">
                            <ul class="clearfix">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-6">
                <div class="contact-form" style="background-color: #f5f8f7;">
                    <form enctype="multipart/form-data" id="contact-form" class="default-form2" action="{{route('login')}}" method="post">
                        @csrf
                        <div>
                            @if (session('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-box">
                                <input type="email" required value="{{ old('email') }}" name="email" id="email" placeholder="me@example.com" >
                                {!!  requestError($errors,'email')  !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-box">
                                <input type="password" required name="password" id="password" placeholder="********" />
                                {!!  requestError($errors,'password')  !!}
                            </div>
                        </div>


                        <div class="button-box">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                value="">
                            <button class="btn-one" type="submit" data-loading-text="Please wait...">
                                <span class="txt">
                                    Login
                                </span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
