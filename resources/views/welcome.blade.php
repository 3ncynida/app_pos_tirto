<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            color: #000000;
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
            font-size: 84px;
        }

        .links>a {
            color: #000000;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                3ncynida
            </div>

            <div class="links">
                <a href="{{ route('sekolah.category.index') }}">Admin</a>
                <a href="{{ route('sekolah.transaction.index') }}">Cashier</a>
                <a href="{{ route('UI.button') }}">Guest</a>
                <a href="https://github.com/3ncynida">GitHub</a>
            </div>
        </div>
    </div>
    <div id="weather"></div>
    <script>
        const color = ['#CF0A0A', '#DC5F00', '#FFB200', '#3D3BF3', '#B8001F', '#337357'];

        function getRandomItem(arr) {
            const index = Math.floor(Math.random() * arr.length);
            return arr[index];
        }

        document.body.style.backgroundColor = getRandomItem(color);
    </script>
    <script>
        const apiKey = '9c6bac275873f8331db3ae8a09578684'; // Ganti dengan API key Anda
        const city = 'Jakarta';
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const weather = `Temperature: ${Math.round(data.main.temp - 273.15)}°C`;
                document.getElementById('weather').innerText = weather;
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>

</html>
