<!DOCTYPE html>
<html lang="es">

@include('layouts.head')

@yield('head')

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        @include('layouts.navbar')

        <div class="boxed">

           @yield('content')
            
            <nav id="mainnav-container" style="position:fixed">
                <div id="mainnav">
                    @include('layouts.sidebar')
                </div>
            </nav>

        </div>

        @include('layouts.footer')


          <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn in" style="animation: 0.8s ease 0s 1 normal none running jellyIn;">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>

  @include('layouts.script')

   @yield('script')

</body>
</html>
