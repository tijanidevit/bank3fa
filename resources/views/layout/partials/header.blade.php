<header class="main-header main-header-style2">
    <nav class="main-menu main-menu-style2">
        <div class="main-menu__wrapper clearfix">
            <div class="container">
                <div class="main-menu__wrapper-inner">

                    <div class="main-menu-style2-left">
                        <div class="logo-box-style2">
                            <a href="./">
                                <img src="assets/images/resources/logo-2.png" alt="Awesome Logo" title="">
                            </a>
                        </div>
                    </div>

                    <div class="main-menu-style2-right">

                        <div class="main-menu-box">
                            <a href="#" class="mobile-nav__toggler">
                                <i class="icon-menu"></i>
                            </a>

                            @if (!auth()->user())
                                <ul class="main-menu__list one-page-scroll-menu">
                                    <li class="scrollToLink">
                                        <a href="#home">Home</a>
                                    </li>
                                    <li class="scrollToLink">
                                        <a href="#about">About</a>
                                    </li>
                                    <li class="scrollToLink">
                                        <a href="#service">Services</a>
                                    </li>

                                    <li class="">
                                        <a href="register" class="btn text-white btn-success"> Register </a>
                                    </li>
                                    &nbsp;
                                    <li class="">
                                        <a href="login" class="btn text-white btn-success"> Login</a>
                                    </li>
                                </ul>

                            @else
                                <ul class="main-menu__list one-page-scroll-menu">
                                    <li class="scrollToLink">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('fundWallet') }}">Fund Wallet</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('transfer') }}">Transfer Funds</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('transactions') }}">Transactions</a>
                                    </li>
                                    <li class="">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="btn text-white btn-danger"> Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            @endif

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </nav>

</header>


<div class="stricky-header stricky-header--style2 stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler">
            <i class="fas fa-plus"></i>
        </span>
        <div class="logo-box">
            <a href="./" aria-label="logo image">
                <img src="assets/images/resources/mobile-nav-logo.png" alt="" />
            </a>
        </div>
        <div class="mobile-nav__container"></div>
        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@example.com">info@example.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:123456789">444 000 777 66</a>
            </li>
        </ul>
        <div class="mobile-nav__social">
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-facebook-square"></a>
            <a href="#" class="fab fa-pinterest-p"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
    </div>
</div>
