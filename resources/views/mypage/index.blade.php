<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyPage</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #CCCCFF;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
                letter-spacing: .1rem;
            }

            .links > a {
                color: #636b6f;
                padding: 0 15px;
                font-size: 15px;
                font-weight: bold;
                letter-spacing: .2rem;
                text-decoration: none;
                //text-transform: uppercase;
                border-bottom: solid 3px #FFFF66;
            }
            
            a.btn--yellow.btn--border-dotted {
              color: #636b6f;
              background: #FFFF66;
              border: 1px dotted #000;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            h2 {
              position: relative;
              padding: 1rem 2rem calc(1rem + 10px);
              background: #fff100;
            }
            
            h2:before {
              position: absolute;
              top: -7px;
              left: -7px;
              width: 100%;
              height: 100%;
              content: '';
              border: 4px solid #000;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}" >Top</a>
                        <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" >ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h2>GHP Mania</h2>
                </div>

                <!--<div class="links">-->
                <!--    <a href="{{ url('/home') }}">OpenChat</a>-->
                <!--    <a href="{{ url('/home') }}">Tips</a>-->
                <!--    <a href="{{ url('/home') }}">Question</a>-->
                    <!--<a href="https://github.com/laravel/laravel">GitHub</a>-->
                <!--</div>-->
                <!--<br></br>-->
                <!--<div class="links">-->
                <!--    <a href="{{ url('/home') }}">Document</a>-->
                <!--    <a href="{{ url('/home') }}">News</a>-->
                <!--</div>-->
            </div>
        </div>
    </body>
</html>