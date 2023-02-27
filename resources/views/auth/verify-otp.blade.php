@extends('layout.app')

@section('title')
    Verify OTP
@endsection

@section('body')
<section id="contact" class="main-contact-form-area pdb100">
    <div class="container">
        <div class="row">

            <div class="col-xl-6">
                <div class="contact-info-box-style1">
                    <div class="box1"></div>
                    <div class="title">
                        <h2>Verify OTP</h2>
                        <p>And start enjoying free and secure transactions.</p>
                    </div>

                    <ul class="contact-info-1">
                        <li>
                            <div class="icon">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="text">
                                <p>Verify OTP</p>
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
                            {{-- <a href="Verify OTP"><i class="fas fa-arrow-down"></i>Verify OTP</a> --}}
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
                <div class="contact-form" style="background-color: #f5f8f7; padding-top: 10em; padding-bottom: 10em;">
                    <h6 class="my-4">Please check your email address for the sent verification otp</h6>
                    <form enctype="multipart/form-data" id="contact-form" class="default-form2" action="{{route('verifyEmailAction')}}" method="post">
                        @csrf
                        <div>
                            @if (session('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>OTP</label>
                            <div class="input-box">
                                <input type="text" required name="otp" id="otp" />
                                {!!  requestError($errors,'otp')  !!}
                            </div>
                        </div>


                        <div class="button-box">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                value="">
                            <button class="btn-one" type="submit" data-loading-text="Please wait...">
                                <span class="txt">
                                    Verify OTP
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
