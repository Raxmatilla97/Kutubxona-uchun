<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>     
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://templates.iqonic.design/booksto/intro/css/bootstrap.min.css">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="https://templates.iqonic.design/booksto/intro/css/typography.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="https://templates.iqonic.design/booksto/intro/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="https://templates.iqonic.design/booksto/intro/css/responsive.css">
        <!-- Styles -->
       
    </head>
    <body>
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
                <div class="loader">
                </div>
            </div>
        </div>
        <!-- loader END -->
     
        <!-- loader Start -->
        <div id="loading" style="display: none;">
            <div id="loading-center">
                <div class="loader">
                </div>
            </div>
        </div>
        <!-- loader END -->
        <!-- Header -->
            
        <div id="home">
            <div class="main-slider">
                <div id="container-inside">
                    <div id="holder"><canvas width="1855" height="489" style="width: 1855px; height: 489px;"></canvas></div>
                </div>
                <div class="">
                    {{-- Test --}}
                    <section class="sign-in-page" style="background: none;">
                        <div class="container p-0">
                            <div class="row no-gutters height-self-center">
                                <div class="col-sm-12 col-12 align-self-center page-content rounded">
                                <div class="row m-0">
                                    <div class="col-sm-12 col-12 ">
                                        <div class="sign-in-from bg-primary rounded" style="width: 40%; color: gray!important; background-color: #ffffff!important;">
                                            <h1 class="mb-0 text-center text-white" style="color: black!important; font-size: 26px; font-weight: 600;">Kirish</h1>
                                            <img style=" display: block; margin-left: auto; margin-right: auto; width: 30%;" src="https://cspi.uz//storage/app/media/2022-YIL/2/cspu_logo_1024.png" alt="">
                                            <p class="text-center text-white mt-4" style="color: black!important">OTM elektron kutubxonasi katalogidan foydalanish uchun tizimga kirishingiz lozim</p>
                                            <form class="mt-4 form-text">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email manzilingiz</label>
                                                    <input type="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Parolingiz</label>
                                                    <a href="#" class="float-right text-dark" style="font-size: 12px">Parolni unutdingizmi?</a>
                                                    <input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="d-inline-block w-100">
                                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Meni eslab qol</label>
                                                    </div>
                                                </div>
                                                <div class="sign-info text-center">
                                                    <button type="submit" class="btn btn-white d-block w-100 mb-2" style="background-color: #0dd6b8; color: white; font-weight: 700;">Saytga kirish</button>
                                                    <span class="text-dark dark-color d-inline-block line-height-2">Siz ro'yxatdan o'tmaganmisiz? <a href="sign-up.html" style="color: #0d09ef;">Ro'yxatdan o'tish</a></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Test end --}}
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
            <!-- </div> -->
        </div>

        <style>
            

            /*---------------------------------------------------------------------
                                        Sign In
            -----------------------------------------------------------------------*/
            #sign-in-page-box {
                background: #fff;
                border-radius: 10px;
                position: relative;
                overflow: hidden;
                width: 100%;
                min-height: 480px;
                height: 93vh;
                margin: 15px auto;
                box-shadow: 0px 4px 20px 0px rgba(44, 101, 144, 0.1);
                -webkit-box-shadow: 0px 4px 20px 0px rgba(44, 101, 144, 0.1);
            }

            .sign-in-detail {
                color: var(--iq-white);
            }

            .sign-in-page {
                height: 100vh;
                position: relative;
                padding: 15px 0;
            }

            .height-self-center {
                height: 100vh;
                border-radius: 5px;
            }

            .sign-in-page-data {
                border-radius: 5px;
            }

            .sign-in-detail {
                padding: 15px 80px;
            }

            .sign-in-logo {
                display: inline-block;
                width: 100%;
            }

            .sign-in-logo img {
                height: 50px;
            }

            .sign-in-from {
                padding: 30px;
                position: relative;
                margin: 50px;
                width: 50%;
                margin: 0 auto;
            }

            .form-text label {
                color: var(--iq-white)
            }

            .sign-info {
                padding-top: 20px;
            }

            .iq-social-media {
                margin: 0;
                padding: 0;
                float: right;
            }

            .iq-social-media li {
                list-style: none;
                float: left;
                margin-right: 10px;
            }

            .iq-social-media li:last-child {
                margin-right: 0;
            }

            .iq-social-media li a {
                height: 30px;
                width: 30px;
                text-align: center;
                font-size: 18px;
                line-height: 30px;
                display: inline-block;
                -webkit-border-radius: 7px;
                -moz-border-radius: 7px;
                border-radius: 7px;
                background: var(--iq-light-primary);
                color: var(--iq-primary) !important;
            }

            .iq-social-media li a:hover {
                text-decoration: none;
            }

            .page-content .form-control::placeholder {
                color: #f5fffe;
                opacity: 1
            }

            .page-content select.form-control:focus::-ms-value {
                color: #fafafb;
                background-color: #fff
            }

            .page-content .form-control {
                color: #d9d9d9;
            }

            /*--------------------------*/
            .social-container {
                margin: 20px 0;
            }

            .form-container {
                position: absolute;
                top: 0;
                height: 100%;
                transition: all 0.6s ease-in-out;
                display: flex;
                align-items: center;
            }

            .sign-in-container {
                right: 0;
                width: 50%;
                z-index: 2;
            }

            .sign-up-container {
                left: 0;
                width: 50%;
                opacity: 0;
                z-index: 1;
            }

            .overlay-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 50%;
                height: 100%;
                overflow: hidden;
                transition: transform 0.6s ease-in-out;
                z-index: 100;
            }

            .overlay {
                background: var(--iq-primary);
                color: var(--iq-white);
                position: relative;
                left: -100%;
                height: 100%;
                width: 200%;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
            }

            .overlay-panel {
                position: absolute;
                top: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 0 40px;
                height: 100%;
                width: 50%;
                text-align: center;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
            }

            .overlay-right {
                right: 0;
                transform: translateX(0);
            }

            .overlay-left {
                transform: translateX(-20%);
            }

            .iq-border-primary:hover {
                color: var(--iq-white) !important;
            }

            .container.right-panel-active .sign-in-container {
                transform: translateX(100%);
            }

            .container.right-panel-active .overlay-container {
                transform: translateX(-100%);
            }

            .container.right-panel-active .sign-up-container {
                transform: translateX(100%);
                opacity: 1;
                z-index: 5;
            }

            .container.right-panel-active .overlay {
                transform: translateX(50%);
            }

            .container.right-panel-active .overlay-left {
                transform: translateX(0);
            }

            .container.right-panel-active .overlay-right {
                transform: translateX(20%);
            }

        </style>

        <script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","426660348535524");fbq("track","PageView");fbq("trackCustom",window.tag_manager_event,{product:window.tag_manager_product});</script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=426660348535524&amp;ev=PageView&amp;noscript=1"></noscript>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://templates.iqonic.design/booksto/intro/js/jquery-3.4.1.min.js"></script>
        <script src="https://templates.iqonic.design/booksto/intro/js/wow.min.js"></script>  
        <script src="https://templates.iqonic.design/booksto/intro/js/custom.js"></script>
                   
    </body>
</html>
