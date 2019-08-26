<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    @include('partiels.html_header')
    <title>Document</title>
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">
        @include('partiels.sidebar')
        <!-- PAGE CONTENT -->
        @yield('content')          
        <!-- END PAGE CONTENT -->
    </div>
    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>                    
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-success btn-lg" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Yes
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->
    <!-- START PRELOADS -->
    <audio id="audio-alert" src="{{ asset('/audio/alert.mp3') }}" preload="auto"></audio>
    <audio id="audio-fail" src="{{ asset('/audio/fail.mp3') }}" preload="auto"></audio>
    <!-- END PRELOADS -->
    @yield('script')
</body>
</html>