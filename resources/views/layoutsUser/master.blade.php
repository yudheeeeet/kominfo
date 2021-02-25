<!DOCTYPE html>
<html lang="en">

@include('layoutsUser.header')

<body id="page-top">
    <div id="wrapper">
        
        @include('layoutsUser.navbar')
        
        
        @yield('content')

        @include('layoutsUser.script')
        
        @yield('script')
        
        @yield('modal')

        
    </div>
</body>

</html>