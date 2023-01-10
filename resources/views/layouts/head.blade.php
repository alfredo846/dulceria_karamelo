<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dulcería karamelo | @yield('title')</title>


    <!--STYLESHEET-->
    <!--=================================================-->
   <link rel="shortcut icon" href="{{ asset('assets/img/invoice-logo.png') }}" type="image/x-icon">

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets\css\nifty.min.css') }}" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('assets\css\demo\nifty-demo-icons.min.css') }}" rel="stylesheet">

    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('assets\plugins\pace\pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets\plugins\pace\pace.min.js') }}"></script>

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\font-awesome\css\font-awesome.min.css') }}" rel="stylesheet">

    <style>
    #mainnav {
    height: 100%;
    background-image: url("../../assets/img/sidebar4.png");
     background-position: center;
     background-repeat: no-repeat;
     background-size: cover;
	 border-radius: 0;
	 border: none;
	 margin: 0;
	 padding: 0;
	 opacity: .9;
     color: #1c3550!important;
    }

	#mainnav-menu>.active {
    background-color: #f1d7f1 !important;
	opacity: .8;
     }

    #mainnav-menu ul a:hover,.menu-popover .sub-menu ul a:hover{
        color:#783449 !important}

    #mainnav-menu>li>a:hover,#mainnav-menu>li>a:active{
        color:#783449  !important}

    #mainnav-menu .active:not(.active-sub)>a {
    color: #783449;
}
     
 	</style> 
</head>