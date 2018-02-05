<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
            <div id="test">
                <span v-bind:title="title">
                    @{{ message }}
                </span>
                <span v-if="seen">
                    @{{ message }}
                </span>
                <span v-for='single in muti'>
                    @{{single.text}}
                </span>
                <button v-on:click='reverseMessage'>依賴反轉</button>
                <input v-model='message' type="text" id="test_vue">
            </div>
            <test-template param='hi!'></test-template>
        </div>
        <script>
            var test = new Vue({
                el: '#test',
                data: {
                    message: 'hello world',
                    title: 'test title',
                    seen: false,
                    muti: [
                        {text: 1},
                        {text: 2},
                        {text: 3},
                    ],
                },
                methods: {
                    reverseMessage: function(){
                        this.message = this.message.split('').reverse().join('');
                    }                    
                }
            });
            
            Vue.component('test-template', {
                prop: ['param'],
                template: '<div>this is a test block</div>'
            });
        </script>
    </body>
</html>
