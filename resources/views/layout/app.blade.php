<!DOCTYPE html>
<html lang="en">
@include('layout.partials.head')


<body>
    {{-- @include('layout.partials.preloader') --}}

    <div class="page-wrapper">
        @include('layout.partials.header')
    </div>


    @yield('body')



    @include('layout.partials.footer')
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <i class="icon-chevron"></i>
    </a>
</body>
@include('layout.partials.scripts')
