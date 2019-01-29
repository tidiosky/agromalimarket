<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="{{ asset('template/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Links -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/camera.css') }}" rel="stylesheet">
    <!--JS-->
    <script src="{{ asset('template/js/jquery.js') }}"></script>
    <script src="{{ asset('template/js/jquery-migrate-1.2.1.min.js') }}"></script>


    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="{{ asset('images/ie8-panel/warning_bar_0000_us.jpg') }} " border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="{{ asset('js/html5shiv.js') }} "></script>
    <![endif]-->
    <script src='{{ asset('js/device.min.j') }}'></script>
    @toastr_css
</head>
<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>

        <div class="container well clearfix">
            <h1 class="navbar-brand">
                <a data-type='rd-navbar-brand' href="./">feed <span> and Farm Supplies </span></a>
            </h1>
            <ul class="inline-list">
                <li><a class="fa fa-facebook" href="#"></a></li>
                <li><a class="fa fa-twitter" href="#"></a></li>
                <li><a class="fa fa-google-plus" href="#"></a></li>
            </ul>
        </div>


        <div id="stuck_container" class="stuck_container">
            <nav class="navbar navbar-default navbar-static-top ">
                <div class="container">
                    <ul class="navbar-nav sf-menu" data-type="navbar">
                        <li class="active">
                            <a href="./">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="index-1.html">About us</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Farm tour </a>
                                </li>
                                <li>
                                    <a href="#">Our values </a>
                                </li>
                                <li>
                                    <a href="#">Our benefits</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">News</a>
                                        </li>
                                        <li>
                                            <a href="#">Archives</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Our team </a>
                                </li>
                                <li>
                                    <a href="#">Our principles </a>
                                </li>
                                <li>
                                    <a href="#">Skills </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index-2.html">Product</a>
                        </li>
                        <li>
                            <a href="index-3.html">Services</a>
                        </li>

                        <li>
                            <a href="index-4.html">Contacts</a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </header>

    <!--========================================================
                              CONTENT
    =========================================================-->

    <main>
        @yield("map")
        @yield('content')
    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer>

        <section class="well4 bg-white">
            <div class="container center767">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="h4 text-secondary"><span class="material-icons-location_on  text-primary"></span>
                            &nbsp; Address
                        </div>
                        <address class="fw-l">4578 Marmora Road, Glasgow D04 89GR</address>

                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="h4 text-secondary"><span class="material-icons-local_phone text-primary"></span>
                            &nbsp; Phones
                        </div>
                        <a class="fw-l" href="callto:#">800-2345-6789;</a>
                        <a class="fw-l" href="callto:#"> 800-2345-6790</a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="h4 text-secondary"><span class="material-icons-access_time text-primary "></span>
                            &nbsp; Hours
                        </div>
                        <p class="fw-l">7 days a week from 8:00 am to 7:00 pm</p>
                    </div>

                </div>
            </div>
        </section>
        <div class="container text-center">
            <p class="copyright">
                <a href="#">Feed and Farm Supplies</a> &#169; <span id="copyright-year"></span>.
                <a class="text-primary" href="index-5.html">Privacy Policy</a>
                More <a rel="nofollow" href="http://www.templatemonster.com/category.php?category=76&type=1" target="_blank">Farm Templates at TemplateMonster.com</a>
            </p>
        </div>


    </footer>
</div>

@jquery
@toastr_js
@toastr_render
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/tm-scripts.js') }}"></script>
<!-- </script> -->
<script>
    (function () {

    })();
    (function () {
        $("time.timeago").timeago();
    })();
    $("#materialFormCardEmailExc").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['ml','ca', 'gb', 'us']
    });
    const path_url_search_prod = '{{ route('search_pro') }}';
    const path_url_search_user = '{{ route('search_path') }}';
</script>
<script src="{{ asset('js/jquery.timeago.js') }}"></script>
<script src="{{ asset('js/jquery.timeago.fr.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>
<script src="{{ asset('js/models.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>

</body>
</html>
